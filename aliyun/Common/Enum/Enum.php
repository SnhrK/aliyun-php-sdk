<?php
namespace Aliyun\Common\Enum;
use \ReflectionClass;
/**
 * Enum Base Class
 * @package Aliyun\Common\Enum
 */
abstract class Enum {
    private $value;

    /**
     * Constructor
     * @param constant $value Contains Constant Value
     */
    public function __construct($value) {
       $reflectionClass = new ReflectionClass($this);
       if (!in_array($value, $reflectionClass->getConstants(), true)) {
           throw new InvalidArgumentException;
       }
       $this->value = $value;
    }

    /**
     * @override
     */
    final public static function __callStatic($name, $arguments) {
        $class = get_called_class();
        return new $class(constant("$class::$name"));
    }

    /**
     * @override
     */
    final public function valueOf() {
        return $this->value;
    }

    /**
     * override
     */
    final public function __toString() {
        return (string)$this->valueOf();
    }
}
