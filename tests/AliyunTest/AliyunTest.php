<?php
namespace AliyunTest;

class AliyunTest extends \PHPUnit\Framework\TestCase {
    
        /**
         * @test
         */
        public function aliyuntest()
        {
            $expected   = [120, 20, 22];
            $actual   = [120, 20, 22];
            $this->assertEquals($expected, $actual);
        }
}