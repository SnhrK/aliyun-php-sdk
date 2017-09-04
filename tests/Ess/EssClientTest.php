<?php
namespace AliyunTest\Ess;
use AliyunTest\AliyunTestBase;
use Aliyun\Ess\EssClient;
use Aliyun\Slb\SlbClient;
use Aliyun\Ecs\EcsClient;

class EssClientTest extends AliyunTestBase {
    /**
     * @override
     * @return Aliyun\Ess\EssClient
     */
    protected function getTargetInstance() {
        return new EssClient();
    }
    /**
     * @override
     */
    public function setUp() {
        parent::setUp();
        $this->ecs = new EcsClient();
        $this->ecs->setProfile(['region' => self::TEST_REGION, 'key' => $_SERVER['TEST_ALIYUN_ACCESS'], 'secret' => $_SERVER['TEST_ALIYUN_SECRET']])->build();
        $this->slb = new SlbClient();
        $this->slb->setProfile(['region' => self::TEST_REGION, 'key' => $_SERVER['TEST_ALIYUN_ACCESS'], 'secret' => $_SERVER['TEST_ALIYUN_SECRET']])->build();
    }
    /**
     * Test for testCreateScalingGroup
     * @dataProvider getProviderCreateScalingGroup
     * @param array $setter Request value
     */
    public function testCreateScalingGroup($setter) {
        $vswitch_id = $this->ecs->describeVSwitch()['VSwitches']['VSwitch'][0]['VSwitchId'];
        $this->assertInternalType("string", $vswitch_id);
        $loadbalancer_id = $this->slb->describeLoadBalancer()['LoadBalancers']['LoadBalancer'][0]['LoadBalancerId'];
        $this->assertInternalType("string", $loadbalancer_id);
        $setter += ['LoadBalancerId' => $loadbalancer_id, 'VSwitchId' => $vswitch_id];
        $actual = $this->target->createScalingGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Providor for CreateScalingGroup
     * @return array The list of Test Parameters
     */
    function getProviderCreateScalingGroup() {
        return [
            'success' => [['MaxSize' => 2, 'MinSize' => 1, 'ScalingGroupName' => self::TEST_ID, 'DefaultCooldown' => 360]],
        ];
    }

    /**
     * Test for testDescribeScalingGroup
     */
    public function testDescribeScalingGroup() {
        $actual = $this->target->describeScalingGroup();
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testCreateScalingConfiguration
     * @dataProvider getProviderCreateScalingConfiguration
     * @param array $setter Request value
     */
    public function testCreateScalingConfiguration($setter) {
        $scalinggroup_id = $this->target->describeScalingGroup()['ScalingGroups']['ScalingGroup'][0]['ScalingGroupId'];
        $this->assertInternalType("string", $scalinggroup_id);
        $sg_id = $this->ecs->describeSecurityGroup()['SecurityGroups']['SecurityGroup'][0]['SecurityGroupId'];
        $this->assertInternalType("string", $sg_id);
        $setter += ['ScalingGroupId' => $scalinggroup_id, 'SecurityGroupId' => $sg_id];
        $actual = $this->target->createScalingConfiguration($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Provider for CreateScalingConfiguration
     * @return array The list of Test Parameters
     */
    function getProviderCreateScalingConfiguration() {
        return [
            'success' => [
                ['ScalingConfigurationName' => self::TEST_ID,
                  // 'ImageId' => self::TEST_IMAGE_ID,
                  'ImageId' => 'm-6wehv9dxc6s6i5bmxixi',
                  'InstanceType' => self::TEST_INSTANCE_TYPE,
                  'InternetChargeType' => 'PayByTraffic',
                  'InternetMaxBandwidthOut' => 100,
                  'IoOptimized' => 'optimized'
                ]
            ],
        ];
    }

    /**
     * Test for testDescribeScalingConfigrations
     */
    public function testDescribeScalingConfigrations() {
        $actual = $this->target->describeScalingConfigrations();
        $this->assertInternalType("array", $actual);
        // var_dump($actual['ScalingConfigurations']['ScalingConfiguration']);
    }

    /**
     * Test for testEnableScalingGroup
     */
    public function testEnableScalingGroup() {
        $scalinggroup_id = $this->target->describeScalingGroup()['ScalingGroups']['ScalingGroup'][0]['ScalingGroupId'];
        $this->assertInternalType("string", $scalinggroup_id);
        $scalingconfig_id = $this->target->describeScalingConfigrations()['ScalingConfigurations']['ScalingConfiguration'][0]['ScalingConfigurationId'];
        $this->assertInternalType("string", $scalingconfig_id);
        $instance_id = $this->ecs->describeInstance()['Instances']['Instance'][0]['InstanceId'];
        $this->assertInternalType("string", $instance_id);
        $setter = ['ScalingGroupId' => $scalinggroup_id, 'ActiveScalingConfigurationId' => $scalingconfig_id, 'InstanceId1' => $instance_id];
        $actual = $this->target->enableScalingGroup($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testCreateScalingRule
     * @dataProvider getProviderCreateScalingRule
     * @param array $setter Request value
     */
    public function testCreateScalingRule($setter) {
        $scalinggroup_id = $this->target->describeScalingGroup()['ScalingGroups']['ScalingGroup'][0]['ScalingGroupId'];
        $this->assertInternalType("string", $scalinggroup_id);
        $setter += ['ScalingGroupId' => $scalinggroup_id];
        $actual = $this->target->createScalingRule($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Provider for CreateScalingRule
     * @return array The list of Test Parameters
     */
    function getProviderCreateScalingRule() {
        $rulename = self::TEST_ID;
        return [
            'up' => [['ScalingRuleName' => $rulename. '-up', 'AdjustmentType' => 'QuantityChangeInCapacity', 'AdjustmentValue' => 1, 'Cooldown' => 60]],
            'down' => [['ScalingRuleName' => $rulename. '-down', 'AdjustmentType' => 'QuantityChangeInCapacity', 'AdjustmentValue' => -1, 'Cooldown' => 60]],
        ];
    }

    /**
     * Test for testDescribeScalingRule
     */
    public function testDescribeScalingRule() {
        $actual = $this->target->describeScalingRule();
        $this->assertInternalType("array", $actual);
        // var_dump($actual);
    }

    /**
     * Test for testDescribeScalingActivity
     */
    public function testDescribeScalingActivity() {
        $scalinggroup_id = $this->target->describeScalingGroup()['ScalingGroups']['ScalingGroup'][0]['ScalingGroupId'];
        $this->assertInternalType("string", $scalinggroup_id);
        $setter = ['ScalingGroupId' => $scalinggroup_id];
        $actual = $this->target->describeScalingActivity($setter);
        $this->assertInternalType("array", $actual);
        // var_dump($actual['ScalingActivities']);
    }

    /**
     * Test for testAttachInstnace
     */
    public function testAttachInstnace() {
        $scalinggroup_id = $this->target->describeScalingGroup()['ScalingGroups']['ScalingGroup'][0]['ScalingGroupId'];
        $this->assertInternalType("string", $scalinggroup_id);
        $instance_id = $this->ecs->describeInstance()['Instances']['Instance'][0]['InstanceId'];
        $this->assertInternalType("string", $instance_id);
        $setter = ['ScalingGroupId' => $scalinggroup_id, 'InstanceId1' => $instance_id];
        $actual = $this->target->attachInstance($setter);
        $this->assertInternalType("array", $actual);
        // var_dump($actual['ScalingActivities']);
    }




}
