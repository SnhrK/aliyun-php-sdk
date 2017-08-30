<?php
namespace Aliyun\Cms;
use Aliyun\Common\Client\Client;
use Aliyun\Common\Client\Method;
use Aliyun\Common\Client\Traits\ClientTrait;
use Cms\Request\V20170301 as Cms;
/**
 * CmsClient Aliyun Cms Client to '/OpenSdk/aliyun-php-sdk-cms/Cms/Request/V20170301'
 * @package Aliyun\Cms
 */
class CmsClient extends Client {
    /**
     * Traits
     */
    use ClientTrait;
    /**
     * create Alarm
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function createAlarm(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Cms\CreateAlarmRequest(), $setter+Method::POST, $time);
        return $result;
    }

    /**
     * list Alarm
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function listAlarm(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Cms\ListAlarmRequest(), $setter+Method::GET, $time);
        return $result;
    }

    /**
     * list Alarm History
     * @param array $setter Setter is options eg.[Method => GET];
     * @param integer $time Time to delay execution
     * @return array result
     */
    function listAlarmHistory(array $setter = [], $time = 0) {
        $result = $this->executeClient(new Cms\listAlarmHistoryRequest(), $setter+Method::GET, $time);
        return $result;
    }
}
