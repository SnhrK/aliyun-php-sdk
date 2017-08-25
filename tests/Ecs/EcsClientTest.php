<?php
namespace AliyunTest\Ecs;
use AliyunTest\AliyunTestBase;
use Aliyun\Ecs\EcsClient;

class EcsClientTest extends AliyunTestBase {
    /**
     * @override
     * @return Aliyun\Ecs\EcsClient
     */
    protected function getTargetInstance() {
        return new EcsClient();
    }

    /**
     * Test for testDescribeRegion
     */
    public function testDescribeRegion($setter = []) {
        $actual = $this->target->describeRegion($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("RequestId", $actual);
        $this->assertArrayHasKey("Regions", $actual);
    }

    /**
     * Test for testCreateVpc
     */
    public function testCreateVpc() {
        $setter = ['CidrBlock' => '10.0.0.0/08', 'VpcName' => 'aliyun-php-test'];
        $actual = $this->target->createVpc($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("VpcId", $actual);
    }

    /**
     * Test for testDescribeVpc
     */
    public function testDescribeVpc($setter = []) {
        $actual = $this->target->describeVpc($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("Vpcs", $actual);
    }

    /**
     * Test for testCreateVSwitch
     */
    public function testCreateVSwitch($setter = []) {
        $vpc_id = $this->target->describeVpc($setter)['Vpcs']['Vpc'][0]['VpcId'];
        $this->assertInternalType("string", $vpc_id);
        $setter = ['CidrBlock' => '10.0.0.0/24', 'VpcId' => $vpc_id, 'ZoneId' => self::TEST_ZONE];
        $actual = $this->target->createVSwitch($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("VSwitchId", $actual);
    }

    /**
     * Test for testCreateSecurityGroup
     */
    public function testCreateSecurityGroup($setter = []) {
        $vpc_id = $this->target->describeVpc($setter)['Vpcs']['Vpc'][0]['VpcId'];
        $this->assertInternalType("string", $vpc_id);
        $setter = ['VpcId' => $vpc_id];
        $actual = $this->target->createSecurityGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDescribeSecurityGroup
     */
    public function testDescribeSecurityGroup($setter = []) {
        $actual = $this->target->describeSecurityGroup($setter);
        $this->assertArrayHasKey("SecurityGroups", $actual);
    }

    /**
     * Test for testAuthorizeSecurityGroup
     */
    public function testAuthorizeSecurityGroup($setter = []) {
        $sg_id = $this->target->describeSecurityGroup($setter)['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id, 'NicType' => 'intranet', 'IpProtocol' => 'tcp', 'PortRange' => '22/22','Policy' => 'accept', 'Priority' => '1', 'SourceCidrIp' => '0.0.0.0/0'];
        $actual = $this->target->authorizeSecurityGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testAuthorizeSecurityGroupEgress
     */
    public function testAuthorizeSecurityGroupEgress($setter = []) {
        $sg_id = $this->target->describeSecurityGroup($setter)['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id, 'NicType' => 'intranet', 'IpProtocol' => 'all', 'PortRange' => '-1/-1','Policy' => 'accept', 'Priority' => '1', 'DestCidrIp' => '0.0.0.0/0'];
        $actual = $this->target->authorizeSecurityGroupEgress($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDescribeSecurityGroupAttribute
     */
    public function testDescribeSecurityGroupAttribute($setter = []) {
        $sg_id = $this->target->describeSecurityGroup($setter)['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id];
        $actual = $this->target->describeSecurityGroupAttribute($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testRevokeSecurityGroup
     */
    public function testRevokeSecurityGroup($setter = []) {
        $sg_id = $this->target->describeSecurityGroup($setter)['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id, 'IpProtocol' => 'tcp', 'PortRange' => '22/22', 'SourceCidrIp' => '0.0.0.0/0'];
        $actual = $this->target->revokeSecurityGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testRevokeSecurityGroupEgress
     */
    public function testRevokeSecurityGroupEgress($setter = []) {
        $sg_id = $this->target->describeSecurityGroup($setter)['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id, 'IpProtocol' => 'all', 'PortRange' => '-1/-1', 'DestCidrIp' => '0.0.0.0/0'];
        $actual = $this->target->revokeSecurityGroupEgress($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDeleteSecurityGroup
     */
    public function testDeleteSecurityGroup($setter = []) {
        $sg_id = $this->target->describeSecurityGroup($setter)['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id];
        $actual = $this->target->deleteSecurityGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDeleteVpc
     */
    public function testDeleteVpc($setter = []) {
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

}
