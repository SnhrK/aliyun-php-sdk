<?php
namespace Aliyun\Ecs;
use Aliyun\Common\Client\Client;
use Aliyun\Common\Client\Method;
use Aliyun\Common\Client\Traits\ClientTrait;
use Ecs\Request\V20140526 as Ecs;
/**
 * EcsClient Aliyun Ecs Client to '/OpenSdk/aliyun-php-sdk-ecs/Ecs/Request/20140526'
 * @package Aliyun\Ecs
 */
class EcsClient extends Client {
    /**
     * Traits
     */
    use ClientTrait;
    /**
     * describe Regions
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeRegion(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeRegionsRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * create Vpc
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createVpc(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\CreateVpcRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * describe Vpcs
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeVpc(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeVpcsRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * delete Vpc
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteVpc(array $setter = [], $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeVpcsRequest(), $setter+Method::GET, 'Available')
            ->executeClient(new Ecs\DeleteVpcRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * create VSwith
     * @param array $output execute Aliyun Value Output
     * @param string $zonne_id ZeoneId
     * @return $this
     */
    function createVSwitch(array $setter = [], $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeVpcsRequest(), ['VpcId' => $setter['VpcId']]+Method::GET, 'Available')
            ->executeClient(new Ecs\CreateVSwitchRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * delete VSwith
     * @param array $output execute Aliyun Value Output
     * @param string $zonne_id ZeoneId
     * @return $this
     */
    function deleteVSwitch(array $setter = [], $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeVSwitchesRequest(), $setter+Method::GET, 'Available')
            ->executeClient(new Ecs\DeleteVSwitchRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * describe VSwitch
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeVSwitch(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeVSwitchesRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * create securitygroup
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createSecurityGroup(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\CreateSecurityGroupRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * describe securitygroup
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeSecurityGroup(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeSecurityGroupsRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * delete securitygroup
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteSecurityGroup(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DeleteSecurityGroupRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * Authorize securitygroup (ingress)
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function authorizeSecurityGroup(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\AuthorizeSecurityGroupRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * Authorize securitygroupegress
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function authorizeSecurityGroupEgress(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\AuthorizeSecurityGroupEgressRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * describe SecurityGroupAttribute
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeSecurityGroupAttribute(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeSecurityGroupAttributeRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * revoke securitygroup (ingress)
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function revokeSecurityGroup(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\RevokeSecurityGroupRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * revoke securitygroup (egress)
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function revokeSecurityGroupEgress(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\RevokeSecurityGroupEgressRequest(), $setter+Method::POST, $time);
        return $result;
    }


    /**
     * create Keypair
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createKeypair(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\CreateKeypairRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * describe Keypair
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeKeypair(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeKeyPairsRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * delete Keypair
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteKeypair(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DeleteKeyPairsRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * create Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createInstance(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\CreateInstanceRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     *  describe Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeInstance(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\DescribeInstancesRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     *  delete Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteInstance(array $setter = [], $describe, $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeInstancesRequest(), $describe+Method::GET, 'Stopped')
            ->executeClient(new Ecs\DeleteInstanceRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * allocate PublicIp
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function allocatePublicIp(array $setter = [], array $describe, $status, $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeInstancesRequest(), $describe+Method::GET, $status)
            ->executeClient(new Ecs\AllocatePublicIpAddressRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * start Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function startInstance(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\StartInstanceRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * stop Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function stopInstance(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Ecs\StopInstanceRequest(), $setter+Method::POST, $time);
        return $result;
    }

}
