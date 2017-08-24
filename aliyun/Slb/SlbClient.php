<?php
namespace Aliyun\Slb;
use Aliyun\Common\Client\Client;
use Aliyun\Common\Client\Traits\ClientTrait;
use Slb\Request\V20140515 as Slb;
/**
 * SlbClient Aliyun Slb Client to '/OpenSdk/aliyun-php-sdk-slb/Slb/Request/V20140515'
 * @package Aliyun\Slb
 */
class SlbClient extends Client {
    /**
     * Traits
     */
    use ClientTrait;
    /**
     * create ServerLoadBalancer
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancer(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\CreateLoadBalancerRequest(), $setter, $time);
        return $result;
    }

    /**
     * describe ServerLoadBalancer
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeLoadBalancer(array $setter, $time = 0) {
        $setter += ['Method' => 'GET'];
        $result = $this->executeClient(new Slb\DescribeLoadBalancersRequest(), $setter, $time);
        return $result;
    }

    /**
     * set ServerLoadBalancerStatus
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function setLoadBalancerStatus(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\SetLoadBalancerStatusRequest(), $setter, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerHTTPListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerHTTPListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\CreateLoadBalancerHTTPListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerHTTPSListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerHTTPSListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\CreateLoadBalancerHTTPSListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerTCPListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerTCPListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\CreateLoadBalancerTCPListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerUDPListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerUDPListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\CreateLoadBalancerUDPListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * start LoadBalancerListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function startLoadBalancerListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\StartLoadBalancerListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * stop LoadBalancerListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function stopLoadBalancerListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\StopLoadBalancerListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * delete LoadBalancerListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteLoadBalancerListener(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\DeleteLoadBalancerListenerRequest(), $setter, $time);
        return $result;
    }

    /**
     * delete LoadBalancer
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteLoadBalancer(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Slb\DeleteLoadBalancerRequest(), $setter, $time);
        return $result;
    }

}
