<?php
namespace Aliyun\Common\Client;
use Aliyun\Common\Enum\Enum;
/**
 * Method set 'Aliyun Method'
 * @package Aliyun\Common\Client
 */
class Method extends Enum {
    /**
     * Argument of method of aliyun
     * @var array
     */
    const GET     = ['Method' => 'GET'];
    const POST    = ['Method' => 'POST'];
    const DELETE  = ['Method' => 'DELETE'];
    const PUT     = ['Method' => 'PUT'];
}
