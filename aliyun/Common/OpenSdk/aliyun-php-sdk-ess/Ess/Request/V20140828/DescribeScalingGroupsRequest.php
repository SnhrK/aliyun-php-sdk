<?php
/*
 * Licensed to the Apache Software Foundation (ASF) under one
 * or more contributor license agreements.  See the NOTICE file
 * distributed with this work for additional information
 * regarding copyright ownership.  The ASF licenses this file
 * to you under the Apache License, Version 2.0 (the
 * "License"); you may not use this file except in compliance
 * with the License.  You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing,
 * software distributed under the License is distributed on an
 * "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
 * KIND, either express or implied.  See the License for the
 * specific language governing permissions and limitations
 * under the License.
 */
namespace Ess\Request\V20140828;

class DescribeScalingGroupsRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Ess", "2014-08-28", "DescribeScalingGroups");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

  private  $pageNumber;

  private  $pageSize;

  private  $scalingGroupId1;

  private  $scalingGroupName1;

  private  $scalingGroupId2;

  private  $scalingGroupName2;

  private  $scalingGroupId3;

  private  $scalingGroupName3;

  private  $scalingGroupId4;

  private  $scalingGroupName4;

  private  $scalingGroupId5;

  private  $scalingGroupName5;

  private  $scalingGroupId6;

  private  $scalingGroupName6;

  private  $scalingGroupId7;

  private  $scalingGroupName7;

  private  $scalingGroupId8;

  private  $scalingGroupName8;

  private  $scalingGroupId9;

  private  $scalingGroupName9;

  private  $scalingGroupId10;

  private  $scalingGroupName10;

  private  $scalingGroupId11;

  private  $scalingGroupName11;

  private  $scalingGroupId12;

  private  $scalingGroupName12;

  private  $scalingGroupId13;

  private  $scalingGroupName13;

  private  $scalingGroupId14;

  private  $scalingGroupName14;

  private  $scalingGroupId15;

  private  $scalingGroupName15;

  private  $scalingGroupId16;

  private  $scalingGroupName16;

  private  $scalingGroupId17;

  private  $scalingGroupName17;

  private  $scalingGroupId18;

  private  $scalingGroupName18;

  private  $scalingGroupId19;

  private  $scalingGroupName19;

  private  $scalingGroupId20;

  private  $scalingGroupName20;

	public function getOwnerId() {
		return $this->ownerId;
	}

	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
		$this->queryParameters["OwnerId"]=$ownerId;
	}

	public function getResourceOwnerAccount() {
		return $this->resourceOwnerAccount;
	}

	public function setResourceOwnerAccount($resourceOwnerAccount) {
		$this->resourceOwnerAccount = $resourceOwnerAccount;
		$this->queryParameters["ResourceOwnerAccount"]=$resourceOwnerAccount;
	}

	public function getResourceOwnerId() {
		return $this->resourceOwnerId;
	}

	public function setResourceOwnerId($resourceOwnerId) {
		$this->resourceOwnerId = $resourceOwnerId;
		$this->queryParameters["ResourceOwnerId"]=$resourceOwnerId;
	}

  public function getPageNumber() {
		return $this->pageNumber;
	}

  public function setPageNumber($pageNumber) {
		$this->pageNumber = $pageNumber;
		$this->queryParameters["PageNumber"]=$pageNumber;
	}

  public function getPageSize() {
		return $this->pageSize;
	}

  public function setPageSize($pageSize) {
		$this->pageSize = $pageSize;
		$this->queryParameters["PageSize"]=$pageSize;
	}

  public function getScalingGroupId1() {
		return $this->scalingGroupId1;
	}

	public function setInstanceId1($scalingGroupId1) {
		$this->scalingGroupId1 = $scalingGroupId1;
		$this->queryParameters["ScalingGroupId1"]=$scalingGroupId1;
	}

  public function getScalingGroupId2() {
    return $this->scalingGroupId2;
  }

  public function setInstanceId2($scalingGroupId2) {
    $this->scalingGroupId2 = $scalingGroupId2;
    $this->queryParameters["ScalingGroupId2"]=$scalingGroupId2;
  }

  public function getScalingGroupId3() {
    return $this->scalingGroupId3;
  }

  public function setInstanceId3($scalingGroupId3) {
    $this->scalingGroupId3 = $scalingGroupId3;
    $this->queryParameters["ScalingGroupId3"]=$scalingGroupId3;
  }

  public function getScalingGroupId4() {
    return $this->scalingGroupId4;
  }

  public function setInstanceId4($scalingGroupId4) {
    $this->scalingGroupId4 = $scalingGroupId4;
    $this->queryParameters["ScalingGroupId4"]=$scalingGroupId4;
  }

  public function getScalingGroupId5() {
    return $this->scalingGroupId5;
  }

  public function setInstanceId5($scalingGroupId5) {
    $this->scalingGroupId5 = $scalingGroupId5;
    $this->queryParameters["ScalingGroupId5"]=$scalingGroupId5;
  }

  public function getScalingGroupId6() {
    return $this->scalingGroupId6;
  }

  public function setInstanceId6($scalingGroupId6) {
    $this->scalingGroupId6 = $scalingGroupId6;
    $this->queryParameters["ScalingGroupId6"]=$scalingGroupId6;
  }

  public function getScalingGroupId7() {
    return $this->scalingGroupId7;
  }

  public function setInstanceId7($scalingGroupId7) {
    $this->scalingGroupId7 = $scalingGroupId7;
    $this->queryParameters["ScalingGroupId7"]=$scalingGroupId7;
  }

  public function getScalingGroupId8() {
    return $this->scalingGroupId8;
  }

  public function setInstanceId8($scalingGroupId8) {
    $this->scalingGroupId8 = $scalingGroupId8;
    $this->queryParameters["ScalingGroupId8"]=$scalingGroupId8;
  }

  public function getScalingGroupId9() {
    return $this->scalingGroupId9;
  }

  public function setInstanceId9($scalingGroupId9) {
    $this->scalingGroupId9 = $scalingGroupId9;
    $this->queryParameters["ScalingGroupId9"]=$scalingGroupId9;
  }

  public function getScalingGroupId10() {
    return $this->scalingGroupId10;
  }

  public function setInstanceId10($scalingGroupId10) {
    $this->scalingGroupId10 = $scalingGroupId10;
    $this->queryParameters["ScalingGroupId10"]=$scalingGroupId10;
  }

  public function getScalingGroupId11() {
    return $this->scalingGroupId11;
  }

  public function setInstanceId11($scalingGroupId11) {
    $this->scalingGroupId11 = $scalingGroupId11;
    $this->queryParameters["ScalingGroupId11"]=$scalingGroupId11;
  }

  public function getScalingGroupId12() {
    return $this->scalingGroupId12;
  }

  public function setInstanceId12($scalingGroupId12) {
    $this->scalingGroupId12 = $scalingGroupId12;
    $this->queryParameters["ScalingGroupId12"]=$scalingGroupId12;
  }

  public function getScalingGroupId13() {
    return $this->scalingGroupId13;
  }

  public function setInstanceId13($scalingGroupId13) {
    $this->scalingGroupId13 = $scalingGroupId13;
    $this->queryParameters["ScalingGroupId13"]=$scalingGroupId13;
  }

  public function getScalingGroupId14() {
    return $this->scalingGroupId14;
  }

  public function setInstanceId14($scalingGroupId14) {
    $this->scalingGroupId14 = $scalingGroupId14;
    $this->queryParameters["ScalingGroupId14"]=$scalingGroupId14;
  }

  public function getScalingGroupId15() {
    return $this->scalingGroupId15;
  }

  public function setInstanceId15($scalingGroupId15) {
    $this->scalingGroupId15 = $scalingGroupId15;
    $this->queryParameters["ScalingGroupId15"]=$scalingGroupId15;
  }

  public function getScalingGroupId16() {
    return $this->scalingGroupId16;
  }

  public function setInstanceId16($scalingGroupId16) {
    $this->scalingGroupId16 = $scalingGroupId16;
    $this->queryParameters["ScalingGroupId16"]=$scalingGroupId16;
  }

  public function getScalingGroupId17() {
    return $this->scalingGroupId17;
  }

  public function setInstanceId17($scalingGroupId17) {
    $this->scalingGroupId17 = $scalingGroupId17;
    $this->queryParameters["ScalingGroupId17"]=$scalingGroupId17;
  }

  public function getScalingGroupId18() {
    return $this->scalingGroupId18;
  }

  public function setInstanceId18($scalingGroupId18) {
    $this->scalingGroupId18 = $scalingGroupId18;
    $this->queryParameters["ScalingGroupId18"]=$scalingGroupId18;
  }

  public function getScalingGroupId19() {
    return $this->scalingGroupId19;
  }

  public function setInstanceId19($scalingGroupId19) {
    $this->scalingGroupId19 = $scalingGroupId19;
    $this->queryParameters["ScalingGroupId19"]=$scalingGroupId19;
  }

  public function getScalingGroupId20() {
    return $this->scalingGroupId20;
  }

  public function setInstanceId20($scalingGroupId20) {
    $this->scalingGroupId20 = $scalingGroupId20;
    $this->queryParameters["ScalingGroupId20"]=$scalingGroupId20;
  }

}
