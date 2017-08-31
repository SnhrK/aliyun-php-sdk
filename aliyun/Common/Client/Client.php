<?php
namespace Aliyun\Common\Client;
use Aliyun\Common\Autoload\Autoload;
use Aliyun\Common\Client\WaitTime;
use Aliyun\Common\Client\Traits\ClientTrait;
/**
 * Client set 'Aliyun Client'
 * @package Aliyun\Common\Client
 */
class Client {
    /**
     * Traits
     */
    use ClientTrait;
    /**
     * Constructs a client
     */
    public function __construct() {
        $this->load();
    }

    /**
     * load aliyun autoload
     * @return include_once configfile
     */
    public static function load() {
        return Autoload::aliyunAutoload();
    }

    /**
     * set aliyun client profile
     * @param array $profile DefaultProfile eg.['region' => 'ap-northeast-1','key' => 'L24DfetgAreWF','secret' => '34Fgrdlvm2eaPff9dv5tHgl']
     * @return $this Client
     */
    public function setProfile($profile) {
        $this->profile = $profile;
        return $this;
    }

    /**
     * build aliyun client
     * @return $this Client
     */
    public function build() {
        if (!empty($this->profile)) $this->setClient($this->profile);
        return $this;
    }

    /**
     * execute aliyun client
     * @param mixed   $request  Aliyun Request
     * @param array   $setter   Aliyun Request Palameter
     * @param integer $waittime Delay execution
     * @return Execution aliyun reslut
     */
    public function executeClient($request, $setter, $waittime) {
        if (!empty($waittime)) usleep($waittime);
        $result = $this->setAcsRequest($request, $setter)->sendAcsRequest($request);
        return $result;
    }

    /**
     * Function to retry until the status is successfully confirmed
     * @param mixed   $request    Request aliyun
     * @param array   $setter     Aliyun parameter
     * @param string  $chkStatus  Check Status
     * @param integer $maxRetryCount MaxRetryCount
     * @param integer $waittime   Delay execution
     * @return $this Client
     */
    public function retryExecuteClient($request, $setter, $chkStatus, $maxRetryCount = 5, $waittime = 0) {
        $status = '';
        $retryCount = 0;
        if (empty($waittime)) $waittime = WaitTime::TIME;
        while ($status != $chkStatus || $retryCount < $maxRetryCount) {
            $status = $this->executeClient($request, $setter, $waittime);
            if (!empty($setter['VpcId'])) $status = $status['Vpcs']['Vpc'][0]['Status'];
            if (!empty($setter['VSwitchId'])) $status = $status['VSwitches']['VSwitch'][0]['Status'];
            if (!empty($setter['InstanceIds'][0])) $status = $status['Instances']['Instance'][0]['Status'];
            $retryCount ++;
        }
        return $this;
    }

}
