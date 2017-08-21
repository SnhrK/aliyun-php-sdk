<?php
namespace AliyunTest;

class AliyunTest extends \PHPUnit\Framework\TestCase {

        /**
         * @test
         */
        public function aliyuntest()
        {
            $expected   = ['test'];
            $actual   = ['test'];
            $this->assertEquals($expected, $actual);
        }
}
