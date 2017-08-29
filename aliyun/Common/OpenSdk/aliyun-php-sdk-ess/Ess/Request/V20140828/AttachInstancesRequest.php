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

class AttachInstancesRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Ess", "2014-08-28", "AttachInstances");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $scalingGroupId;

  private  $instanceId1;

  private  $instanceId2;

  private  $instanceId3;

  private  $instanceId4;

  private  $instanceId5;

  private  $instanceId6;

  private  $instanceId7;

  private  $instanceId8;

  private  $instanceId9;

  private  $instanceId10;

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

	public function getInstanceId1() {
		return $this->instanceId1;
	}

	public function setInstanceId1($instanceId1) {
		$this->instanceId1 = $instanceId1;
		$this->queryParameters["InstanceId.1"]=$instanceId1;
	}

  public function getInstanceId2() {
    return $this->instanceId2;
  }

  public function setInstanceId2($instanceId2) {
    $this->instanceId2 = $instanceId2;
    $this->queryParameters["InstanceId2"]=$instanceId2;
  }

  public function getInstanceId3() {
    return $this->instanceId3;
  }

  public function setInstanceId3($instanceId3) {
    $this->instanceId3 = $instanceId3;
    $this->queryParameters["InstanceId3"]=$instanceId3;
  }

  public function getInstanceId4() {
    return $this->instanceId4;
  }

  public function setInstanceId4($instanceId4) {
    $this->instanceId4 = $instanceId4;
    $this->queryParameters["InstanceId4"]=$instanceId4;
  }

  public function getInstanceId5() {
    return $this->instanceId5;
  }

  public function setInstanceId5($instanceId5) {
    $this->instanceId5 = $instanceId5;
    $this->queryParameters["InstanceId5"]=$instanceId5;
  }

  public function getInstanceId6() {
    return $this->instanceId6;
  }

  public function setInstanceId6($instanceId6) {
    $this->instanceId6 = $instanceId6;
    $this->queryParameters["InstanceId6"]=$instanceId6;
  }

  public function getInstanceId7() {
    return $this->instanceId7;
  }

  public function setInstanceId7($instanceId7) {
    $this->instanceId7 = $instanceId7;
    $this->queryParameters["InstanceId7"]=$instanceId7;
  }

  public function getInstanceId8() {
    return $this->instanceId8;
  }

  public function setInstanceId8($instanceId8) {
    $this->instanceId8 = $instanceId8;
    $this->queryParameters["InstanceId8"]=$instanceId8;
  }

  public function getInstanceId9() {
    return $this->instanceId9;
  }

  public function setInstanceId9($instanceId9) {
    $this->instanceId9 = $instanceId9;
    $this->queryParameters["InstanceId9"]=$instanceId9;
  }

  public function getInstanceId10() {
    return $this->instanceId10;
  }

  public function setInstanceId10($instanceId10) {
    $this->instanceId10 = $instanceId10;
    $this->queryParameters["InstanceId10"]=$instanceId10;
  }

}
