<?php
namespace AliyunTest\Slb;
use AliyunTest\AliyunTestBase;
use Aliyun\Slb\SlbClient;
// use Aliyun\Ecs\EcsClient;

class SlbClientTest extends AliyunTestBase {
    /**
     * @override
     * @return Aliyun\Slb\SlbClient
     */
    protected function getTargetInstance() {
        return new SlbClient();
    }
    /**
     * @override
     */
    public function setUp() {
        parent::setUp();
        $this->ecs = new EcsClient();
        $this->ecs->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
    }
    /**
     * Test for testCreateLoadBalancer
     */
    public function testCreateLoadBalancer() {
        $setter = ['LoadBalancerName' => 'aliyun-php-test','AddressType' => 'internet','InternetChargeType' => 'paybytraffic','Bandwidth' => 1];
        $actual = $this->target->createLoadBalancer($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("LoadBalancerId", $actual);
    }

    /**
     * Test for testDescribeLoadBalancer
     */
    public function testDescribeLoadBalancer() {
        $actual = $this->target->describeLoadBalancer();
        $this->assertInternalType("array", $actual);
        $setter = ['LoadBalancerId' => $actual['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId']];
        $actual = $this->target->describeLoadBalancerAttribute($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("ListenerPorts", $actual);

    }

    /**
     * Test for testCreateLoadBalancerListener
     * testCreateLoadBalancerHTTPListener, testCreateLoadBalancerTCPListener
     * @dataProvider getProviderCreateLoadBalancerListener
     * @param array $setter Request Value
     */
    public function testCreateLoadBalancerListener($setter) {
        $loadbalancer_id = $this->target->describeLoadBalancer()['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter += ['LoadBalancerId' => $loadbalancer_id];
        if (!empty($setter['StickySession']) && !empty($setter['HealthCheck'])) {
            $actual = $this->target->createLoadBalancerHTTPListener($setter);
        } else {
            $actual = $this->target->createLoadBalancerTCPListener($setter);
        }
        $this->assertInternalType("array", $actual);
        //start
        $ope_setter = ['LoadBalancerId' => $loadbalancer_id, 'ListenerPort' => $setter['ListenerPort']];
        $actual = $this->target->startLoadBalancerListener($ope_setter);
        $this->assertInternalType("array", $actual);
        //stop
        $actual = $this->target->stopLoadBalancerListener($ope_setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Provider for CreateLoadBalancerListener
     * @return array The list of Test Parameters
     */
    function getProviderCreateLoadBalancerListener() {
        $common_value = ['Bandwidth' => -1,'HealthCheckDomain' => '$_ip','HealthCheckURI' => '/index.html','HealthyThreshold' => 2,'UnhealthyThreshold' => 10,'HealthCheckInterval' => 10,'HealthCheckHttpCode' => 'http_2xx'];
        return [
            'http' => [$common_value+['ListenerPort' => 80, 'BackendServerPort' => 80, 'StickySession' => 'off', 'HealthCheck' => 'on', 'HealthCheckConnectPort' => 80, 'HealthCheckTimeout' => 5]],
            'tcp' => [$common_value+['ListenerPort' => 22, 'BackendServerPort' => 22, 'HealthCheckConnectPort' => 22]],
        ];
    }

    /**
     * Test for testSetLoadBalancerStatus
     */
    public function testSetLoadBalancerStatus() {
        $loadbalancer_id = $this->target->describeLoadBalancer()['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id,'LoadBalancerStatus' => 'active'];
        $actual = $this->target->setLoadBalancerStatus($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDeleteLoadBalancerListener
     * @dataProvider getProviderDeleteLoadBalancerListener
     * @param integer $httpPort Request Value
     */
    public function testDeleteLoadBalancerListener($port) {
        $loadbalancer_id = $this->target->describeLoadBalancer()['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id, 'ListenerPort' => $port];
        $actual = $this->target->deleteLoadBalancerListener($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Provider for DeleteLoadBalancerListener
     * @return array The list of Test Parameters
     */
    function getProviderDeleteLoadBalancerListener() {
        return [
            'http' => [80],
            'tcp' => [22],
        ];
    }

    /**
     * Test for testAddBackendServer
     */
    public function testAddBackendServer() {
        $instance_id = $this->ecs->describeInstance()['Instances']['Instance'][0]['InstanceId'];
        $this->assertInternalType("string", $instance_id);
        $loadbalancer_id = $this->target->describeLoadBalancer()['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id,
            'BackendServers' => '['. json_encode(['ServerId' => $instance_id, 'Weight' => 100]) . ']'
        ];
        $actual = $this->target->addBackendServer($setter);
        $this->assertInternalType("array", $actual);
    }

}
