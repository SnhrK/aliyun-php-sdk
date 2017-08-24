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
        $this->assertInternalType("array", $actual);
    }

    /**
    * Test for testCreateLoadBalancerHTTPListener
    */
    public function testCreateLoadBalancerHTTPListener($setter = []) {
        $loadbalancer_id = $this->setSlbClient()->target->describeLoadBalancer($setter)['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id,'ListenerPort' => 80, 'BackendServerPort' => 80, 'Bandwidth' => -1, 'StickySession' => 'off', 'HealthCheck' => 'on', 'HealthCheckDomain' => '$_ip',
           'HealthCheckURI' => '/index.html', 'HealthCheckConnectPort' => 80, 'HealthyThreshold' => 2, 'UnhealthyThreshold' => 10, 'HealthCheckTimeout' => 5, 'HealthCheckInterval' => 10, 'HealthCheckHttpCode' => 'http_2xx'
        ];
        $actual = $this->target->createLoadBalancerHTTPListener($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
    * Test for testDeleteLoadBalancer
    */
    public function testDeleteLoadBalancer($setter = []) {
        $loadbalancer_id = $this->setSlbClient()->target->describeLoadBalancer($setter)['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter = ['LoadBalancerId' => $loadbalancer_id];
        $actual = $this->target->deleteLoadBalancer($setter);
        $this->assertInternalType("array", $actual);
    }

    function setSlbClient() {
        $this->target->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
        return $this;
    }
}
