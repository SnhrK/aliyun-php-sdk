<?php
namespace Aliyun\Common\Client;
use Aliyun\Common\Autoload\Autoload;
/**
 * Client set 'Aliyun Client'
 * @package Aliyun\Common\Client
 */
class Client {
    /**
     * Constructs a client
     */
    public function __construct() {
        $this->load();
    }

    /**
     * load aliyun autoload
     */
    public static function load() {
        return Autoload::aliyunAutoload();
    }

}
