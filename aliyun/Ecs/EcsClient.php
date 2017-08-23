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
        $result = $this->retryExecuteClient(new Ecs\DescribeVpcsRequest(), ['Method' => 'POST']+$setter, 'Available')
            ->executeClient(new Ecs\DeleteVpcRequest(), ['Method' => 'POST']+$setter, $time);
        return $result;
    }
}
