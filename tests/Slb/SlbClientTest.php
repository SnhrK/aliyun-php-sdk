<?php
namespace AliyunTest\Slb;
use AliyunTest\AliyunTestBase;
use Aliyun\Slb\SlbClient;

class SlbClientTest extends AliyunTestBase {
    /**
     * @override
     * @return Aliyun\Slb\SlbClient
     */
    protected function getTargetInstance() {
        return new SlbClient();
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
     * @dataProvider getProvidorCreateLoadBalancerListener
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
     * Test Providor for CreateLoadBalancerListener
     * @return array The list of Test Parameters
     */
    function getProvidorCreateLoadBalancerListener() {
        return [
            'http' => [['ListenerPort' => 80, 'BackendServerPort' => 80, 'Bandwidth' => -1, 'StickySession' => 'off', 'HealthCheck' => 'on', 'HealthCheckDomain' => '$_ip', 'HealthCheckURI' => '/index.html',
                'HealthCheckConnectPort' => 80, 'HealthyThreshold' => 2, 'UnhealthyThreshold' => 10, 'HealthCheckTimeout' => 5, 'HealthCheckInterval' => 10, 'HealthCheckHttpCode' => 'http_2xx'
            ]],
            'tcp' => [['ListenerPort' => 22, 'BackendServerPort' => 22, 'Bandwidth' => -1, 'HealthCheckDomain' => '$_ip', 'HealthCheckURI' => '/index.html', 'HealthCheckConnectPort' => 22,
                'HealthyThreshold' => 2, 'UnhealthyThreshold' => 10, 'HealthCheckInterval' => 10, 'HealthCheckHttpCode' => 'http_2xx'
            ]],
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
     * @dataProvider getProvidorDeleteLoadBalancerListener
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
     * Test Providor for DeleteLoadBalancerListener
     * @return array The list of Test Parameters
     */
    function getProvidorDeleteLoadBalancerListener() {
        return [
            'http' => [80],
            'tcp' => [22],
        ];
    }

    /**
     * Test for testDeleteLoadBalancer
     */
    public function testDeleteLoadBalancer() {
        $loadbalancer_id = $this->target->describeLoadBalancer()['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id];
        $actual = $this->target->deleteLoadBalancer($setter);
        $this->assertInternalType("array", $actual);
    }

}
