<?php
namespace AliyunTest\Cms;
use AliyunTest\AliyunTestBase;
use Aliyun\Cms\CmsClient;
use Aliyun\Ess\EssClient;

class CmsClientTest extends AliyunTestBase {
    /**
     * @override
     * @return Aliyun\Cms\CmsClient
     */
    protected function getTargetInstance() {
        return new CmsClient();
    }
    /**
     * @override
     */
    public function setUp() {
        parent::setUp();
        $this->ess = new EssClient();
        $this->ess->setClient(self::TEST_REGION, $_SERVER['TEST_ALIYUN_ACCESS'], $_SERVER['TEST_ALIYUN_SECRET']);
    }

    /**
     * Test for testListAlarm
     */
    public function testListAlarm() {
        $actual = $this->target->listAlarm();
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testListAlarmHistory
     */
    public function testListAlarmHistory() {
        $actual = $this->target->listAlarmHistory();
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test for testCreateAlarm
     * @dataProvider getProviderCreateAlarm
     */
    public function testCreateAlarm($setter) {
// 'Dimensions' => json_encode(['scaling_group'])
        $group_id = $this->ess->describeScalingGroup()['ScalingGroups']['ScalingGroup'][0]['ScalingGroupId'];
        $this->assertInternalType("string", $group_id);
        $setter += ['Dimensions' => '[' . json_encode(['scaling_group' => $group_id]) . ']'];
        // $setter += ['Dimensions' => json_encode(['scaling_group' => $group_id])];
        $actual = $this->target->createAlarm($setter);
        $this->assertInternalType("array", $actual);
    }

    /**
     * Test Provider for CreateAlarm
     * @return array The list of Test Parameters
     */
    function getProviderCreateAlarm() {
        return [
            'up' => [
                  ['Name' => self::TEST_ID. '-add', 'Namespace' => 'acs_ecs', 'MetricName' => 'vm.CpuUtilization', 'Period' => 300, 'Statistics' => 'Average', 'ComparisonOperator' => '>=',
                  'Threshold' => '50.0', 'ContactGroups' => 'null', 'EvaluationCount' => 1, 'StartTime' => 0, 'EndTime' => 24, 'SilenceTime' => 60, 'NotifyType' => 2]
            ],
        ];
    }

}
