<?php
namespace AliyunTest\Ecs;
use AliyunTest\AliyunTestBase;
use Aliyun\Ecs\EcsClient;

class EcsClientTest extends AliyunTestBase {
    /**
     * @override
     * @return Mobingi\Core\User\Action
     */
    protected function getTargetInstance() {
        return new EcsClient();
    }

    function testSetClient() {
        $this->target->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
        $actual = (array)$this->target->aliyunclient;
        $this->assertArrayHasKey("iClientProfile", $actual);
        $this->assertArrayHasKey("__urlTestFlag__", $actual);
    }

   /**
   * Test for testDescribeRegion
   */
    public function testDescribeRegion() {
        $this->setEcsClient();
        $setter = [];
        $actual = $this->target->describeRegion($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("RequestId", $actual);
        $this->assertArrayHasKey("Regions", $actual);
    }

    /**
    * Test for testCreateVpc
    */
     public function testCreateVpc() {
         $this->setEcsClient();
         $setter = ['CidrBlock' => '10.0.0.0/08', 'VpcName' => 'aliyun-php-test'];
         $actual = $this->target->createVpc($setter);
         $this->assertInternalType("array", $actual);
         $this->assertArrayHasKey("VpcId", $actual);
     }

     /**
     * Test for testCreateVSwitch
     */
      public function testCreateVSwitch() {
          $this->setEcsClient();
          $setter = [];
          $result = $this->target->describeVpc($setter);
          $this->assertInternalType("array", $result);
          $this->assertArrayHasKey("Vpcs", $result);
          $setter = ['CidrBlock' => '10.0.0.0/24', 'VpcId' => $result['Vpcs']['Vpc'][0]['VpcId'], 'ZoneId' => self::TEST_ZONE];
          $actual = $this->target->createVSwitch($setter);
          $this->assertInternalType("array", $actual);
          $this->assertArrayHasKey("VSwitchId", $actual);
      }

     /**
     * Test for testDeleteVpc
     */
      public function testDeleteVpc() {
          $this->setEcsClient();
          $setter = [];

          //delete vswitch
          $result = $this->target->describeVSwitch($setter);
          $this->assertInternalType("array", $result);
          $this->assertArrayHasKey("VSwitches", $result);
          $vswitch_setter = ['VSwitchId' => $result['VSwitches']['VSwitch'][0]['VSwitchId']];
          $actual = $this->target->deleteVSwitch($vswitch_setter);
          $this->assertInternalType("array", $actual);

          // //delete vpc
          $result = $this->target->describeVpc($setter);
          $this->assertInternalType("array", $result);
          $this->assertArrayHasKey("Vpcs", $result);
          $setter = ['VpcId' => $result['Vpcs']['Vpc'][0]['VpcId']];
          $actual = $this->target->deleteVpc($setter);
          $this->assertInternalType("array", $actual);
      }

      function setEcsClient() {
          $this->target->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
          return $this;
      }

}
