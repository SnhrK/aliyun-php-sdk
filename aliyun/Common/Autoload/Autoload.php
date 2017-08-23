<?php
namespace Aliyun\Common\Autoload;
/**
 * Autoload aliyun php sdk
 * @package Aliyun\Common\Autoload
 */
class Autoload {

  /**
   * inclued_once Aliyun Config file
   */
    static public function aliyunAutoload () {
        include_once __DIR__ . '/../OpenSdk/aliyun-php-sdk-core/Config.php';
    }

}
