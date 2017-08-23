<?php
namespace AliyunTest\Ecs;
use Aliyun\Ecs\EcsClient;

class EcsClientTest extends \PHPUnit\Framework\TestCase {
   /**
   * Test for testDescribeRegion
   */
    public function testDescribeRegion() {
        $this->ecs = new EcsClient();
        $setter = [];
        $actual = $this->ecs->setClient('ap-northeast-1', $_ENV['TEST_ALIYUN_ACCESS'], $_ENV['TEST_ALIYUN_SECRET'])->describeRegion($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("RequestId", $actual);
        $this->assertArrayHasKey("Regions", $actual);
    }

    /**
    * Test for testCreateVpc
    */
     public function testCreateVpc() {
         $this->ecs = new EcsClient();
         $setter = ['CidrBlock' => '10.0.0.0/08', 'VpcName' => $_ENV['TEST_ALIYUN_NAME']];
         $actual = $this->ecs->setClient('ap-northeast-1', $_ENV['TEST_ALIYUN_ACCESS'], $_ENV['TEST_ALIYUN_SECRET'])->createVpc($setter);
         $this->assertInternalType("array", $actual);
         $this->assertArrayHasKey("VpcId", $actual);
     }

     /**
     * Test for testDescribeVpc
     */
      public function testDescribeVpc() {
          $this->ecs = new EcsClient();
          $setter = [];
          $result = $this->ecs->setClient('ap-northeast-1', $_ENV['TEST_ALIYUN_ACCESS'], $_ENV['TEST_ALIYUN_SECRET'])->describeVpc($setter);
          $this->assertInternalType("array", $result);
          $this->assertArrayHasKey("Vpcs", $result);
          $setter = ['VpcId' => $result['Vpcs']['Vpc'][0]['VpcId']];
          $actual = $this->ecs->deleteVpc($setter);
          $this->assertInternalType("array", $actual);
      }

}
