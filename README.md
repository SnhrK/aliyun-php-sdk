# aliyun-php-sdk
[![Build Status](https://travis-ci.org/SnhrK/aliyun-php-sdk.svg?branch=master)](https://travis-ci.org/SnhrK/aliyun-php-sdk)

## Library
Alibaba Cloud SDK for PHP https://github.com/aliyun/aliyun-openapi-php-sdk

## Example

```php
use Aliyun\Ecs\EcsClient;

$this->ecs = new EcsClient();
$result = $this->ecs
    ->setClient(ALIYUN_REGION, ALIYUN_ACCESS_KEY, ALIYUN_SECRET_KEY)
    ->describeRegion(['Method' => 'GET']);
print_r($result);
```
