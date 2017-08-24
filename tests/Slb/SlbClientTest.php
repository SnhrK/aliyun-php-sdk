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

    function testSetClient() {
        $this->setSlbClient();
        $actual = (array)$this->target->aliyunclient;
        $this->assertArrayHasKey("iClientProfile", $actual);
        $this->assertArrayHasKey("__urlTestFlag__", $actual);
    }

    /**
     * Test for testCreateLoadBalancer
     */
    public function testCreateLoadBalancer() {
        $setter = ['LoadBalancerName' => 'aliyun-php-test','AddressType' => 'internet','InternetChargeType' => 'paybytraffic','Bandwidth' => 1];
        $actual = $this->setSlbClient()->target->createLoadBalancer($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("LoadBalancerId", $actual);
    }

    /**
     * Test for testDescribeLoadBalancer
     */
    public function testDescribeLoadBalancer($setter = []) {
        $actual = $this->setSlbClient()->target->describeLoadBalancer($setter);
        // var_dump($actual['LoadBalancers']['LoadBalancer'][0]);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testCreateLoadBalancerListener
     * testCreateLoadBalancerHTTPListener, testCreateLoadBalancerTCPListener
     * @dataProvider getProvidorCreateLoadBalancerListener
     * @param array $setter Request Set Value
     * @param integer $httpPort Request Value
     * @param integer $tcpPort Request Value
     */
    public function testCreateLoadBalancerListener($setter = [], $httpPort, $tcpPort) {
        $loadbalancer_id = $this->setSlbClient()->target->describeLoadBalancer($setter)['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        //HTTP
        $setter = ['LoadBalancerId' => $loadbalancer_id,'ListenerPort' => $httpPort, 'BackendServerPort' => $httpPort, 'Bandwidth' => -1, 'StickySession' => 'off', 'HealthCheck' => 'on', 'HealthCheckDomain' => '$_ip',
           'HealthCheckURI' => '/index.html', 'HealthCheckConnectPort' => $httpPort, 'HealthyThreshold' => 2, 'UnhealthyThreshold' => 10, 'HealthCheckTimeout' => 5, 'HealthCheckInterval' => 10, 'HealthCheckHttpCode' => 'http_2xx'
        ];
        $actual = $this->target->createLoadBalancerHTTPListener($setter);
        $this->assertInternalType("array", $actual);
        //start
        $http_setter = ['LoadBalancerId' => $loadbalancer_id, 'ListenerPort' => $httpPort];
        $actual = $this->target->startLoadBalancerListener($http_setter);
        $this->assertInternalType("array", $actual);
        //stop
        $actual = $this->target->stopLoadBalancerListener($http_setter);
        $this->assertInternalType("array", $actual);

        //TCP
        unset($setter['StickySession'], $setter['HealthCheck'], $setter['HealthCheckTimeout'], $setter['ListenerPort'], $setter['BackendServerPort'], $setter['HealthCheckConnectPort']);
        $setter += ['ListenerPort' => $tcpPort, 'BackendServerPort' => $tcpPort, 'HealthCheckConnectPort' => $tcpPort];
        $actual = $this->target->createLoadBalancerTCPListener($setter);
        $this->assertInternalType("array", $actual);
        //start
        $tcp_setter = ['LoadBalancerId' => $loadbalancer_id, 'ListenerPort' => $tcpPort];
        $actual = $this->target->startLoadBalancerListener($tcp_setter);
        $this->assertInternalType("array", $actual);
        //stop
        $actual = $this->target->stopLoadBalancerListener($tcp_setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Providor for CreateLoadBalancerListener
     * @return array The list of Test Parameters
     */
    function getProvidorCreateLoadBalancerListener() {
        return [
            'success' => [[], 80, 20],
        ];
    }

    /**
     * Test for testSetLoadBalancerStatus
     */
    public function testSetLoadBalancerStatus($setter = []) {
        $loadbalancer_id = $this->setSlbClient()->target->describeLoadBalancer($setter)['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id,'LoadBalancerStatus' => 'active'];
        $actual = $this->setSlbClient()->target->setLoadBalancerStatus($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDeleteLoadBalancer
     * @dataProvider getProvidorDeleteLoadBalancer
     * @param array $setter Request Set Value
     * @param integer $httpPort Request Value
     * @param integer $tcpPort Request Value
     */
    public function testDeleteLoadBalancer($setter = [], $httpPort, $tcpPort) {
        $loadbalancer_id = $this->setSlbClient()->target->describeLoadBalancer($setter)['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        //httplistener
        $http_setter = ['LoadBalancerId' => $loadbalancer_id, 'ListenerPort' => $httpPort];
        $actual = $this->target->deleteLoadBalancerListener($http_setter);
        $this->assertInternalType("array", $actual);
        //httplistener
        $tcp_setter = ['LoadBalancerId' => $loadbalancer_id, 'ListenerPort' => $tcpPort];
        $actual = $this->target->deleteLoadBalancerListener($tcp_setter);
        $this->assertInternalType("array", $actual);
        //loadbalancer
        $setter = ['LoadBalancerId' => $loadbalancer_id];
        $actual = $this->target->deleteLoadBalancer($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Providor for DeleteLoadBalancer
     * @return array The list of Test Parameters
     */
    function getProvidorDeleteLoadBalancer() {
        return [
            'success' => [[], 80, 20],
        ];
    }

    function setSlbClient() {
        $this->target->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
        return $this;
    }

}
