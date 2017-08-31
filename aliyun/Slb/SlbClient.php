<?php
namespace Aliyun\Slb;
use Aliyun\Common\Client\Client;
use Aliyun\Common\Client\Method;
use Slb\Request\V20140515 as Slb;
/**
 * SlbClient Aliyun Slb Client to '/OpenSdk/aliyun-php-sdk-slb/Slb/Request/V20140515'
 * @package Aliyun\Slb
 */
class SlbClient extends Client {
    /**
     * create ServerLoadBalancer
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancer(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\CreateLoadBalancerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * describe ServerLoadBalancer
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeLoadBalancer(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\DescribeLoadBalancersRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * describe ServerLoadBalancerAttribute
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeLoadBalancerAttribute(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\DescribeLoadBalancerAttributeRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * set ServerLoadBalancerStatus
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function setLoadBalancerStatus(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\SetLoadBalancerStatusRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerHTTPListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerHTTPListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\CreateLoadBalancerHTTPListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerHTTPSListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerHTTPSListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\CreateLoadBalancerHTTPSListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerTCPListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerTCPListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\CreateLoadBalancerTCPListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * create ServerLoadBalancerUDPListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createLoadBalancerUDPListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\CreateLoadBalancerUDPListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * start LoadBalancerListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function startLoadBalancerListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\StartLoadBalancerListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * stop LoadBalancerListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function stopLoadBalancerListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\StopLoadBalancerListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * delete LoadBalancerListenter
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteLoadBalancerListener(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\DeleteLoadBalancerListenerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * delete LoadBalancer
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteLoadBalancer(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\DeleteLoadBalancerRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * Add BackendServers
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function addBackendServer(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Slb\AddBackendServersRequest(), $setter+Method::POST, $time);
        return $result;
    }

}
