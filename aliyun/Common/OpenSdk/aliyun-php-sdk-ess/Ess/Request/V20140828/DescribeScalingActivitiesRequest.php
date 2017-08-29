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

class DescribeScalingActivitiesRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Ess", "2014-08-28", "DescribeScalingActivities");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $scalingGroupId;

  private  $pageNumber;

  private  $pageSize;

  private  $statusCode;

  private  $scalingActivityId1;

  private  $scalingActivityId2;

  private  $scalingActivityId3;

  private  $scalingActivityId4;

  private  $scalingActivityId5;

  private  $scalingActivityId6;

  private  $scalingActivityId7;

  private  $scalingActivityId8;

  private  $scalingActivityId9;

  private  $scalingActivityId10;

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

	public function getScalingGroupId() {
		return $this->scalingGroupId;
	}

	public function setScalingGroupId($scalingGroupId) {
		$this->scalingGroupId = $scalingGroupId;
		$this->queryParameters["ScalingGroupId"]=$scalingGroupId;
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

  public function getStatusCode() {
		return $this->statusCode;
	}

	public function setStatusCode($statusCode) {
		$this->statusCode = $statusCode;
		$this->queryParameters["StatusCode"]=$statusCode;
	}

  public function getScalingActivityId1() {
		return $this->scalingActivityId1;
	}

	public function setScalingActivityId1($scalingActivityId1) {
		$this->scalingActivityId1 = $scalingActivityId1;
		$this->queryParameters["ScalingActivityId1"]=$scalingActivityId1;
	}

  public function getScalingActivityId2() {
    return $this->scalingActivityId2;
  }

  public function setScalingActivityId2($scalingActivityId2) {
    $this->scalingActivityId2 = $scalingActivityId2;
    $this->queryParameters["ScalingActivityId2"]=$scalingActivityId2;
  }

  public function getScalingActivityId3() {
    return $this->scalingActivityId3;
  }

  public function setScalingActivityId3($scalingActivityId3) {
    $this->scalingActivityId3 = $scalingActivityId3;
    $this->queryParameters["ScalingActivityId3"]=$scalingActivityId3;
  }

  public function getScalingActivityId4() {
    return $this->scalingActivityId4;
  }

  public function setScalingActivityId4($scalingActivityId4) {
    $this->scalingActivityId4 = $scalingActivityId4;
    $this->queryParameters["ScalingActivityId4"]=$scalingActivityId4;
  }

  public function getScalingActivityId5() {
    return $this->scalingActivityId5;
  }

  public function setScalingActivityId5($scalingActivityId5) {
    $this->scalingActivityId5 = $scalingActivityId5;
    $this->queryParameters["ScalingActivityId5"]=$scalingActivityId5;
  }

  public function getScalingActivityId6() {
    return $this->scalingActivityId6;
  }

  public function setScalingActivityId6($scalingActivityId6) {
    $this->scalingActivityId6 = $scalingActivityId6;
    $this->queryParameters["ScalingActivityId6"]=$scalingActivityId6;
  }

  public function getScalingActivityId7() {
    return $this->scalingActivityId7;
  }

  public function setScalingActivityId7($scalingActivityId7) {
    $this->scalingActivityId7 = $scalingActivityId7;
    $this->queryParameters["ScalingActivityId7"]=$scalingActivityId7;
  }

  public function getScalingActivityId8() {
    return $this->scalingActivityId8;
  }

  public function setScalingActivityId8($scalingActivityId8) {
    $this->scalingActivityId8 = $scalingActivityId8;
    $this->queryParameters["ScalingActivityId8"]=$scalingActivityId8;
  }

  public function getScalingActivityId9() {
    return $this->scalingActivityId9;
  }

  public function setScalingActivityId9($scalingActivityId9) {
    $this->scalingActivityId9 = $scalingActivityId9;
    $this->queryParameters["ScalingActivityId9"]=$scalingActivityId9;
  }

  public function getScalingActivityId10() {
    return $this->scalingActivityId10;
  }

  public function setScalingActivityId10($scalingActivityId10) {
    $this->scalingActivityId10 = $scalingActivityId10;
    $this->queryParameters["ScalingActivityId10"]=$scalingActivityId10;
  }

}
