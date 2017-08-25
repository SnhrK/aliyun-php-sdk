<?php
namespace AliyunTest;
use PHPUnit\Framework\TestCase;
/**
 * Test base class for aliyun
 */
abstract class AliyunTestBase extends TestCase {
    /**
     * The region for test
     */
    const TEST_REGION = "ap-northeast-1";

    /**
     * The zone for test
     */
    const TEST_ZONE = "ap-northeast-1a";

    /**
     * Instance object of test target class
     */
    protected $target;

    public function setUp() {
        parent::setUp();
        $this->target = $this->getTargetInstance();
        $this->target->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
    }

    /**
     * Get instance object of test target class
     * @return test target class
     */
    abstract protected function getTargetInstance();

}
