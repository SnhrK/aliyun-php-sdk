<?php
namespace Aliyun\Common\Client;
use Aliyun\Common\Autoload\Autoload;
/**
 * Client set 'Aliyun Client'
 * @package Aliyun\Common\Client
 */
class Client {
    /**
     * Argument of method of aliyun
     * @var array
     */
    const METHOD = [
        'GET'     => ['Method' => 'GET'],
        'POST'    => ['Method' => 'POST'],
        'DELETE'  => ['Method' => 'DELETE'],
        'PUT'     => ['Method' => 'PUT']
    ];
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
