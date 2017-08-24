<?php
namespace Aliyun\Ecs;
use Aliyun\Common\Client\Client;
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
    function describeRegion(array $setter, $time = 0) {
        $setter += ['Method' => 'GET'];
        $result = $this->executeClient(new Ecs\DescribeRegionsRequest(), $setter, $time);
        return $result;
    }

    /**
     * create Vpc
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createVpc(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\CreateVpcRequest(), $setter, $time);
        return $result;
    }

    /**
     * describe Vpcs
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeVpc(array $setter, $time = 0) {
        $setter += ['Method' => 'GET'];
        $result = $this->executeClient(new Ecs\DescribeVpcsRequest(), $setter, $time);
        return $result;
    }

    /**
     * delete Vpc
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function deleteVpc(array $setter, $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeVpcsRequest(), ['Method' => 'GET']+$setter, 'Available')
            ->executeClient(new Ecs\DeleteVpcRequest(), ['Method' => 'POST']+$setter, $time);
        return $result;
    }

    /**
     * create VSwith
     * @param array $output execute Aliyun Value Output
     * @param string $zonne_id ZeoneId
     * @return $this
     */
    function createVSwitch(array $setter, $time = 0) {
        $describe = ['Method' => 'GET', 'VpcId' => $setter['VpcId']];
        $result = $this->retryExecuteClient(new Ecs\DescribeVpcsRequest(), $describe, 'Available')
            ->executeClient(new Ecs\CreateVSwitchRequest(), ['Method' => 'POST']+$setter, $time);
        return $result;
    }

    /**
     * delete VSwith
     * @param array $output execute Aliyun Value Output
     * @param string $zonne_id ZeoneId
     * @return $this
     */
    function deleteVSwitch(array $setter, $time = 0) {
        $result = $this->retryExecuteClient(new Ecs\DescribeVSwitchesRequest(), ['Method' => 'GET']+$setter, 'Available')
            ->executeClient(new Ecs\DeleteVSwitchRequest(), ['Method' => 'POST']+$setter, $time);
        return $result;
    }

    /**
     * describe VSwitch
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function describeVSwitch(array $setter, $time = 0) {
        $setter += ['Method' => 'GET'];
        $result = $this->executeClient(new Ecs\DescribeVSwitchesRequest(), $setter, $time);
        return $result;
    }

    /**
     * Create securitygroup
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createSecurityGroup(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\CreateSecurityGroupRequest(), $setter, $time);
        return $result;
    }

    /**
     * Authorize securitygroup
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function authorizeSecurityGroup(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\AuthorizeSecurityGroupRequest(), $setter, $time);
        return $result;
    }

    /**
     * create Keypair
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createKeypair(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\CreateKeypairRequest(), $setter, $time);
        return $result;
    }

    /**
     * create Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createInstance(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\CreateInstanceRequest(), $setter, $time);
        return $result;
    }

    /**
     * allocate PublicIp
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function allocatePublicIp(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\AllocatePublicIpRequest(), $setter, $time);
        return $result;
    }

    /**
     * start Instance
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function startInstance(array $setter, $time = 0) {
        $setter += ['Method' => 'POST'];
        $result = $this->executeClient(new Ecs\StartInstanceRequest(), $setter, $time);
        return $result;
    }

}
