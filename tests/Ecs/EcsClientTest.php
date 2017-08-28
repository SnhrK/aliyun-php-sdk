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
    public function testDescribeRegion() {
        $actual = $this->target->describeRegion();
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
    public function testDescribeVpc() {
        $actual = $this->target->describeVpc();
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("Vpcs", $actual);
    }

    /**
     * Test for testCreateVSwitch
     */
    public function testCreateVSwitch() {
        $vpc_id = $this->target->describeVpc()['Vpcs']['Vpc'][0]['VpcId'];
        $this->assertInternalType("string", $vpc_id);
        $setter = ['CidrBlock' => '10.0.0.0/24', 'VpcId' => $vpc_id, 'ZoneId' => self::TEST_ZONE];
        $actual = $this->target->createVSwitch($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("VSwitchId", $actual);
    }

    /**
     * Test for testCreateSecurityGroup
     */
    public function testCreateSecurityGroup() {
        $vpc_id = $this->target->describeVpc()['Vpcs']['Vpc'][0]['VpcId'];
        $this->assertInternalType("string", $vpc_id);
        $setter = ['VpcId' => $vpc_id];
        $actual = $this->target->createSecurityGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDescribeSecurityGroup
     */
    public function testDescribeSecurityGroup() {
        $actual = $this->target->describeSecurityGroup();
        $this->assertArrayHasKey("SecurityGroups", $actual);
    }

    /**
     * Test for testAuthorizeSecurityGroup
     * AuthorizeSecurityGroup, AuthorizeSecurityGroupEgress
     * @dataProvider getProvidorAuthorizeSecurityGroup
     * @param array $setter Request value
     */
    public function testAuthorizeSecurityGroup($setter) {
        $sg_id = $this->target->describeSecurityGroup()['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter += ['SecurityGroupId' => $sg_id];
        if (!empty($setter['SourceCidrIp'])) {
            $actual = $this->target->authorizeSecurityGroup($setter);
        }elseif (!empty($setter['DestCidrIp'])) {
            $actual = $this->target->authorizeSecurityGroupEgress($setter);
        }
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Providor for AuthorizeSecurityGroup
     * @return array The list of Test Parameters
     */
    function getProvidorAuthorizeSecurityGroup() {
        return [
            'ingress/tcp'   => [['NicType' => 'intranet', 'IpProtocol' => 'tcp', 'PortRange' => '22/22','Policy' => 'accept', 'Priority' => '1', 'SourceCidrIp' => '0.0.0.0/0']],
            'ingress/icmp'  => [['NicType' => 'intranet', 'IpProtocol' => 'icmp', 'PortRange' => '-1/-1','Policy' => 'accept', 'Priority' => '10', 'SourceCidrIp' => '0.0.0.0/0']],
            'egress'        => [['NicType' => 'intranet', 'IpProtocol' => 'all', 'PortRange' => '-1/-1','Policy' => 'accept', 'Priority' => '100', 'DestCidrIp' => '0.0.0.0/0']],
        ];
    }

    /**
     * Test for testDescribeSecurityGroupAttribute
     */
    public function testDescribeSecurityGroupAttribute() {
        $sg_id = $this->target->describeSecurityGroup()['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id];
        $actual = $this->target->describeSecurityGroupAttribute($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testCreateKeypair
     */
    public function testCreateKeypair() {
        $setter = ['KeyPairName' => self::TEST_ID];
        $actual = $this->target->createKeypair($setter);
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("KeyPairFingerPrint", $actual);
        $this->assertArrayHasKey("PrivateKeyBody", $actual);
    }

    /**
     * Test for testDescribeKeypair
     */
    public function testDescribeKeypair() {
        $actual = $this->target->describeKeypair();
        $this->assertInternalType("array", $actual);
        $this->assertArrayHasKey("KeyPairs", $actual);
    }

    /**
     * Test for testCreateInstance
     * @dataProvider getProvidorCreateInstance
     * @param array $setter Request Value
     */
    public function testCreateInstance($setter) {
        $vswitch_id = $this->target->describeVSwitch()['VSwitches']['VSwitch'][0]['VSwitchId'];
        $this->assertInternalType("string", $vswitch_id);
        $sg_id = $this->target->describeSecurityGroup()['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $keypair = $this->target->describeKeypair()['KeyPairs']['KeyPair'][0]['KeyPairName'];
        $this->assertInternalType("string", $keypair);
        $setter += ['VSwitchId' => $vswitch_id, 'SecurityGroupId' => $sg_id, 'KeyPairName' => $keypair];
        $actual = $this->target->createInstance($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Providor for CreateInstance
     * @return array The list of Test Parameters
     */
    function getProvidorCreateInstance() {
        return [
            'success' => [
                  ['InstanceName' => self::TEST_ID, 'ImageId' => self::TEST_IMAGE_ID, 'InstanceType' => self::TEST_INSTANCE_TYPE, 'InternetChargeType' => 'PayByTraffic', 'SystemDiskCategory' => 'cloud_efficiency',
                   'InternetMaxBandwidthOut' => 100]
            ],
        ];
    }

    /**
     * Test for testDescribeInstance
     * @param array $setter Request Value
     */
    public function testDescribeInstance() {
        $actual = $this->target->describeInstance();
        // var_dump($actual['Instances']['Instance'][0]);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testAllocatePublicIp
     * @param array $setter Request Value
     */
    public function testAllocatePublicIp() {
        $instance_id = $this->target->describeInstance()['Instances']['Instance'][0]['InstanceId'];
        $this->assertInternalType("string", $instance_id);
        $setter = ['InstanceId' => $instance_id];
        $describe = ['InstanceIds' => json_encode([$instance_id])];
        $actual = $this->target->allocatePublicIp($setter, $describe, 'Stopped');
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testStartInstance
     * @param array $setter Request Value
     */
    public function testStartInstance() {
        $instance_id = $this->target->describeInstance()['Instances']['Instance'][0]['InstanceId'];
        $this->assertInternalType("string", $instance_id);
        $setter = ['InstanceId' => $instance_id];
        $actual = $this->target->startInstance($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testReleaseInstance
     * @param array $setter Request Value
     */
    public function testReleaseInstance() {
        $instance_id = $this->target->describeInstance()['Instances']['Instance'][0]['InstanceId'];
        $this->assertInternalType("string", $instance_id);
        $setter = ['InstanceId' => $instance_id];
        $describe = ['InstanceIds' => json_encode([$instance_id])];
        $actual = $this->target->stopInstance($setter, 4);
        $this->assertInternalType("array", $actual);
        $actual = $this->target->deleteInstance($setter, $describe);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDeleteKeypair
     */
    public function testDeleteKeypair() {
        $setter = ['KeyPairNames' => json_encode([self::TEST_ID])];
        $actual = $this->target->deleteKeypair($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testRevokeSecurityGroup
     * RevokeSecurityGroup, RevokeSecurityGroupEgress
     * @dataProvider getProvidorRevokeSecurityGroup
     * @param array $setter Request value
     */
    public function testRevokeSecurityGroup($setter) {
        $sg_id = $this->target->describeSecurityGroup()['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter += ['SecurityGroupId' => $sg_id];
        if (!empty($setter['SourceCidrIp'])) {
            $actual = $this->target->revokeSecurityGroup($setter);
        }elseif (!empty($setter['DestCidrIp'])) {
            $actual = $this->target->revokeSecurityGroupEgress($setter);
        }
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Providor for RevokeSecurityGroup
     * @return array The list of Test Parameters
     */
    function getProvidorRevokeSecurityGroup() {
        return [
            'ingress/tcp'   => [['IpProtocol' => 'tcp', 'PortRange' => '22/22', 'SourceCidrIp' => '0.0.0.0/0']],
            'ingress/icmp'  => [['IpProtocol' => 'icmp', 'PortRange' => '-1/-1', 'SourceCidrIp' => '0.0.0.0/0']],
            'egress'        => [['IpProtocol' => 'all', 'PortRange' => '-1/-1', 'DestCidrIp' => '0.0.0.0/0']],
        ];
    }

    /**
     * Test for testDeleteSecurityGroup
     */
    public function testDeleteSecurityGroup() {
        $sg_id = $this->target->describeSecurityGroup()['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter = ['SecurityGroupId' => $sg_id];
        $actual = $this->target->deleteSecurityGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testDeleteVpc
     */
    public function testDeleteVpc() {
        //delete vswitch
        $vswitch_id = $this->target->describeVSwitch()['VSwitches']['VSwitch'][0]['VSwitchId'];
        $this->assertInternalType("string", $vswitch_id);
        $vswitch_setter = ['VSwitchId' => $vswitch_id];
        $actual = $this->target->deleteVSwitch($vswitch_setter);
        $this->assertInternalType("array", $actual);

        // //delete vpc
        $vpc_id = $this->target->describeVpc()['Vpcs']['Vpc'][0]['VpcId'];
        $this->assertInternalType("string", $vpc_id);
        $setter = ['VpcId' => $vpc_id];
        $actual = $this->target->deleteVpc($setter);
        $this->assertInternalType("array", $actual);
    }

}
