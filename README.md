# PHP SDK for the Shellrent APIs

PHP SDK for Shellrent API

## Installation

```composer require shellrent/shellrent-api-sdk```

## Usage

```php
$api = new Shellrent\Api\ShellrentAPI($username, $token);
$api->purchases();
```

## Methods

- `purchases()`
- `services()`

## Testing

Copy `.env.example` into `.env` and fill in your API details. Then run the test suite with:

```vendor/bin/phpunit```
