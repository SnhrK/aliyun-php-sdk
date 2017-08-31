<?php
namespace Aliyun\Common\Client\Traits;
/**
 * Get User Info Clients Trait
 *  `use ClientTrait;`
 *  @package Aliyun\Common\Client\Traits
 */
trait ClientTrait {
    /**
     * Set Client Profile Aliyun
     * @param array $profile DefaultProfile eg.['region' => 'ap-northeast-1','key' => 'L24DfetgAreWF','secret' => '34Fgrdlvm2eaPff9dv5tHgl']
     * @return $this ClientTrait
     */
    public function setClient($profile) {
        $iClientProfile = \DefaultProfile::getProfile($profile['region'], $profile['key'], $profile['secret']);
        $this->aliyunclient = new \DefaultAcsClient($iClientProfile);
        return $this;
    }

    /**
     * Execute AliyunClient
     * @param mixed $request Request eg. new Ecs/V20140526/DescribeRegionsRequest()
     * @return array result
     */
    protected function sendAcsRequest($request) {
        $result = $this->aliyunclient->getAcsResponse($request);
        return json_decode(json_encode($result),TRUE);
    }

    /**
     * set AcsRequest
     * @param mixed $request  eg.aliyun AcsRequest
     * @param array $set      AcsRequest setValue eg. ['Method' => 'GET']
     * @return $this ClientTrait
     */
    protected function setAcsRequest($request, $setter) {
        foreach ($setter as $key => $value) {
            $set = 'set'.$key;
            $request->$set($value);
        }
        return $this;
    }

}
