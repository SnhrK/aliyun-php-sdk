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
    * @param string $region Region eg.ap-northeast-1
    * @param string $cred User credential
    * @return $this $class
    */
    public function setClient($region, $access, $secret) {
        $iClientProfile = \DefaultProfile::getProfile($region, $access, $secret);
        $this->aliyunclient = new \DefaultAcsClient($iClientProfile);
        return $this;
    }

    /**
    * Execute AliyunClient
    * @param string $request Request eg.aliyun AcsRequest
    * @param array $set Set Request Parameter
    * @param int $waittime Waittime is execute wait
    * @return mixed $result
    */
    protected function executeClient($request, $setter, $waittime = 0) {
        if (!empty($waittime)) sleep($waittime);
        $result = $this->setAcsRequest($request, $setter)->aliyunclient->getAcsResponse($request);
        return json_decode(json_encode($result),TRUE);
    }

    /**
    * set AcsRequest
    * @param mixed $request eg.aliyun AcsRequest
    * @param array $set AcsRequest setValue eg. ['Method' => 'GET']
    * @return $this
    */
    protected function setAcsRequest($request, $setter) {
        foreach ($setter as $key => $value) {
            $set = 'set'.$key;
            $request->$set($value);
        }
        return $this;
    }

    /**
    * Function to retry until the status is successfully confirmed
    * @param mixed $request Request aliyun
    * @param array $option Option aliyun parameter
    * @param int $maxRetryCount MaxRetryCount
    * @param string $chkStatus Check Status
    * @return $this
    */
    protected function retryExecuteClient($request, $setter, $chkStatus, $maxRetryCount = 5) {
        $status = '';
        $retryCount = 0;
        while ($status != $chkStatus || $retryCount < $maxRetryCount) {
            if ($status != $chkStatus) usleep(500000);
            $status = $this->executeClient($request, $setter);
            if (!empty($setter['VpcId'])) $status = $status['Vpcs']['Vpc'][0]['Status'];
            if (!empty($setter['VSwitchId'])) $status = $status['VSwitches']['VSwitch'][0]['Status'];
            if (!empty($setter['InstanceIds'][0])) $status = $status['Instances']['Instance'][0]['Status'];
            $retryCount ++;
        }
        return $this;
    }

}
