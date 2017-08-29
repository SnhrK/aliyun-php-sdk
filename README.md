# aliyun-php-sdk
[![Build Status](https://travis-ci.org/SnhrK/aliyun-php-sdk.svg?branch=master)](https://travis-ci.org/SnhrK/aliyun-php-sdk)

## Library
Alibaba Cloud SDK for PHP https://github.com/aliyun/aliyun-openapi-php-sdk

## Example

```php
use Aliyun\Ecs\EcsClient;

$this->ecs = new EcsClient();
$result = $this->ecs
    ->setClient("cn-hangzhou", "<your accessKey>", "<your accessSecret>")
    ->describeRegion([]);
print_r($result);
```

## Authors && Contributors

- [SnhrK](https://github.com/SnhrK)
