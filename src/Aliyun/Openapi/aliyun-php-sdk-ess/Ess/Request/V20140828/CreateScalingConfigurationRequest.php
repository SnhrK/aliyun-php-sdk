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

class CreateScalingConfigurationRequest extends \RpcAcsRequest
{
	function  __construct()
	{
		parent::__construct("Ess", "2014-08-28", "CreateScalingConfiguration");
	}

	private  $ownerId;

	private  $resourceOwnerAccount;

	private  $resourceOwnerId;

	private  $scalingGroupId;

  private  $imageId;

  private  $instanceType;

  private  $securityGroupId;

  private  $scalingConfigurationName;

  private  $internetChargeType;

  private  $internetMaxBandwidthIn;

  private  $internetMaxBandwidthOut;

  private  $systemDiskCategory;

  private  $dataDisk1Size;

	private  $dataDisk2Size;

	private  $dataDisk3Size;

	private  $dataDisk4Size;

  private  $dataDisk1Category;

	private  $dataDisk2Category;

	private  $dataDisk3Category;

	private  $dataDisk4Category;

  private  $dataDisk1SnapshotId;

	private  $dataDisk2SnapshotId;

	private  $dataDisk3SnapshotId;

	private  $dataDisk4SnapshotId;

  private  $dataDisk1Device;

	private  $dataDisk2Device;

	private  $dataDisk3Device;

	private  $dataDisk4Device;

	private  $ioOptimized;


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

	public function getImageId() {
		return $this->imageId;
	}

	public function setImageId($imageId) {
		$this->imageId = $imageId;
		$this->queryParameters["ImageId"]=$imageId;
	}

  public function getInstanceType() {
		return $this->instanceType;
	}

	public function setInstanceType($instanceType) {
		$this->instanceType = $instanceType;
		$this->queryParameters["InstanceType"]=$instanceType;
	}

  public function getSecurityGroupId() {
		return $this->securityGroupId;
	}

	public function setSecurityGroupId($securityGroupId) {
		$this->securityGroupId = $securityGroupId;
		$this->queryParameters["SecurityGroupId"]=$securityGroupId;
	}

  public function getScalingConfigurationName() {
		return $this->scalingConfigurationName;
	}

	public function setScalingConfigurationName($scalingConfigurationName) {
		$this->scalingConfigurationName = $scalingConfigurationName;
		$this->queryParameters["ScalingConfigurationName"]=$scalingConfigurationName;
	}

  public function getInternetChargeType() {
		return $this->internetChargeType;
	}

	public function setInternetChargeType($internetChargeType) {
		$this->internetChargeType = $internetChargeType;
		$this->queryParameters["InternetChargeType"]=$internetChargeType;
	}

  public function getInternetMaxBandwidthIn() {
		return $this->internetMaxBandwidthIn;
	}

	public function setInternetMaxBandwidthIn($internetMaxBandwidthIn) {
		$this->internetMaxBandwidthIn = $internetMaxBandwidthIn;
		$this->queryParameters["InternetMaxBandwidthIn"]=$internetMaxBandwidthIn;
	}

  public function getInternetMaxBandwidthOut() {
		return $this->internetMaxBandwidthOut;
	}

	public function setInternetMaxBandwidthOut($internetMaxBandwidthOut) {
		$this->internetMaxBandwidthOut = $internetMaxBandwidthOut;
		$this->queryParameters["InternetMaxBandwidthOut"]=$internetMaxBandwidthOut;
	}

  public function getSystemDiskCategory() {
		return $this->systemDiskCategory;
	}

	public function setSystemDiskCategory($systemDiskCategory) {
		$this->systemDiskCategory = $systemDiskCategory;
		$this->queryParameters["SystemDiskCategory"]=$systemDiskCategory;
	}

  public function getDataDisk1Size() {
		return $this->dataDisk1Size;
	}

	public function setDataDisk1Size($dataDisk1Size) {
		$this->dataDisk1Size = $dataDisk1Size;
		$this->queryParameters["DataDisk1Size"]=$dataDisk1Size;
	}

  public function getDataDisk2Size() {
		return $this->dataDisk2Size;
	}

	public function setDataDisk2Size($dataDisk2Size) {
		$this->dataDisk2Size = $dataDisk2Size;
		$this->queryParameters["DataDisk2Size"]=$dataDisk2Size;
	}

  public function getDataDisk3Size() {
		return $this->dataDisk3Size;
	}

	public function setDataDisk3Size($dataDisk3Size) {
		$this->dataDisk3Size = $dataDisk3Size;
		$this->queryParameters["DataDisk3Size"]=$dataDisk3Size;
	}

  public function getDataDisk4Size() {
		return $this->dataDisk4Size;
	}

	public function setDataDisk4Size($dataDisk4Size) {
		$this->dataDisk4Size = $dataDisk4Size;
		$this->queryParameters["DataDisk4Size"]=$dataDisk4Size;
	}

  public function getDataDisk1Category() {
		return $this->dataDisk1Category;
	}

	public function setDataDisk1Category($dataDisk1Category) {
		$this->dataDisk1Category = $dataDisk1Category;
		$this->queryParameters["DataDisk1Category"]=$dataDisk1Category;
	}

  public function getDataDisk2Category() {
		return $this->dataDisk2Category;
	}

	public function setDataDisk2Category($dataDisk2Category) {
		$this->dataDisk2Category = $dataDisk2Category;
		$this->queryParameters["DataDisk2Category"]=$dataDisk2Category;
	}

  public function getDataDisk3Category() {
		return $this->dataDisk3Category;
	}

	public function setDataDisk3Category($dataDisk3Category) {
		$this->dataDisk3Category = $dataDisk3Category;
		$this->queryParameters["DataDisk3Category"]=$dataDisk3Category;
	}

  public function getDataDisk4Category() {
		return $this->dataDisk4Category;
	}

	public function setDataDisk4Category($dataDisk4Category) {
		$this->dataDisk4Category = $dataDisk4Category;
		$this->queryParameters["DataDisk4Category"]=$dataDisk4Category;
	}

  public function getDataDisk1SnapshotId() {
		return $this->dataDisk1SnapshotId;
	}

	public function setDataDisk1SnapshotId($dataDisk1SnapshotId) {
		$this->dataDisk1SnapshotId = $dataDisk1SnapshotId;
		$this->queryParameters["DataDisk1SnapshotId"]=$dataDisk1SnapshotId;
	}

  public function getDataDisk2SnapshotId() {
		return $this->dataDisk2SnapshotId;
	}

	public function setDataDisk2SnapshotId($dataDisk2SnapshotId) {
		$this->dataDisk2SnapshotId = $dataDisk2SnapshotId;
		$this->queryParameters["DataDisk2SnapshotId"]=$dataDisk2SnapshotId;
	}

  public function getDataDisk3SnapshotId() {
		return $this->dataDisk3SnapshotId;
	}

	public function setDataDisk3SnapshotId($dataDisk3SnapshotId) {
		$this->dataDisk3SnapshotId = $dataDisk3SnapshotId;
		$this->queryParameters["DataDisk3SnapshotId"]=$dataDisk3SnapshotId;
	}

  public function getDataDisk4SnapshotId() {
		return $this->dataDisk4SnapshotId;
	}

	public function setDataDisk4SnapshotId($dataDisk4SnapshotId) {
		$this->dataDisk4SnapshotId = $dataDisk4SnapshotId;
		$this->queryParameters["DataDisk4SnapshotId"]=$dataDisk4SnapshotId;
	}

  public function getDataDisk1Device() {
		return $this->dataDisk1Device;
	}

	public function setDataDisk1Device($dataDisk1Device) {
		$this->dataDisk1Device = $dataDisk1Device;
		$this->queryParameters["DataDisk1Device"]=$dataDisk1Device;
	}

  public function getDataDisk2Device() {
		return $this->dataDisk2Device;
	}

	public function setDataDisk2Device($dataDisk2Device) {
		$this->dataDisk2Device = $dataDisk2Device;
		$this->queryParameters["DataDisk2Device"]=$dataDisk2Device;
	}

  public function getDataDisk3Device() {
		return $this->dataDisk3Device;
	}

	public function setDataDisk3Device($dataDisk3Device) {
		$this->dataDisk3Device = $dataDisk3Device;
		$this->queryParameters["DataDisk3Device"]=$dataDisk3Device;
	}

  public function getDataDisk4Device() {
		return $this->dataDisk4Device;
	}

	public function setDataDisk4Device($dataDisk4Device) {
		$this->dataDisk4Device = $dataDisk4Device;
		$this->queryParameters["DataDisk4Device"]=$dataDisk4Device;
	}

	public function getIoOptimized() {
		return $this->ioOptimized;
	}

	public function setIoOptimized($ioOptimized) {
		$this->ioOptimized = $ioOptimized;
		$this->queryParameters["IoOptimized"]=$ioOptimized;
	}

}
