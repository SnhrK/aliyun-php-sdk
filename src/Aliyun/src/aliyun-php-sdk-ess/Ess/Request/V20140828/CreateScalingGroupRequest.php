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

class CreateScalingGroupRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Ess", "2014-08-28", "CreateScalingGroup");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $scalingGroupName;

  private  $minSize;

  private  $maxSize;

  private  $defaultCooldown;

  private  $loadBalancerId;

  private  $dBInstanceIds;

  private  $removalPolicy1;

  private  $removalPolicy2;

  private  $vSwitchId;

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

	public function getScalingGroupName() {
		return $this->scalingGroupName;
	}

	public function setScalingGroupName($scalingGroupName) {
		$this->scalingGroupName = $scalingGroupName;
		$this->queryParameters["ScalingGroupName"]=$scalingGroupName;
	}

  public function getMinSize() {
		return $this->minSize;
	}

	public function setMinSize($minSize) {
		$this->minSize = $minSize;
		$this->queryParameters["MinSize"]=$minSize;
	}

  public function getMaxSize() {
		return $this->maxSize;
	}

	public function setMaxSize($maxSize) {
		$this->maxSize = $maxSize;
		$this->queryParameters["MaxSize"]=$maxSize;
	}

  public function getDefaultCooldown() {
		return $this->defaultCooldown;
	}

	public function setDefaultCooldown($defaultCooldown) {
		$this->defaultCooldown = $defaultCooldown;
		$this->queryParameters["DefaultCooldown"]=$defaultCooldown;
	}

  public function getLoadBalancerId() {
		return $this->loadBalancerId;
	}

	public function setLoadBalancerId($loadBalancerId) {
		$this->loadBalancerId = $loadBalancerId;
		$this->queryParameters["LoadBalancerId"]=$loadBalancerId;
	}

  public function getDBInstanceIds() {
		return $this->dBInstanceIds;
	}

	public function setDBInstanceIds($dBInstanceIds) {
		$this->dBInstanceIds = $dBInstanceIds;
		$this->queryParameters["DBInstanceIds"]=$dBInstanceIds;
	}

  public function getRemovalPolicy1() {
		return $this->removalPolicy1;
	}

	public function setRemovalPolicy1($removalPolicy1) {
		$this->removalPolicy1 = $removalPolicy1;
		$this->queryParameters["RemovalPolicy1"]=$removalPolicy1;
	}

  public function getRemovalPolicy2() {
		return $this->removalPolicy2;
	}

	public function setRemovalPolicy2($removalPolicy2) {
		$this->removalPolicy2 = $removalPolicy2;
		$this->queryParameters["RemovalPolicy2"]=$removalPolicy2;
	}

  public function getVSwitchId() {
		return $this->vSwitchId;
	}

	public function setVSwitchId($vSwitchId) {
		$this->vSwitchId = $vSwitchId;
		$this->queryParameters["VSwitchId"]=$vSwitchId;
	}

}
