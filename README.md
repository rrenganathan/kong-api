Kong
====

PHP Wrapper for Kong API Gateway - Microservices Management Layer, delivering high performance and reliability.

[![Build Status](https://travis-ci.org/smalot/kong-api.png?branch=master)](https://travis-ci.org/smalot/kong-api)
[![Current Version](https://poser.pugx.org/smalot/kong-api/v/stable.png)](https://packagist.org/packages/smalot/kong-api)
[![composer.lock](https://poser.pugx.org/smalot/kong-api/composerlock)](https://packagist.org/packages/smalot/kong-api)

[![Total Downloads](https://poser.pugx.org/smalot/kong-api/downloads.png)](https://packagist.org/packages/smalot/kong-api)
[![Monthly Downloads](https://poser.pugx.org/smalot/kong-api/d/monthly)](https://packagist.org/packages/smalot/kong-api)
[![Daily Downloads](https://poser.pugx.org/smalot/kong-api/d/daily)](https://packagist.org/packages/smalot/kong-api)


Compatibility
=============

Currently supported Kong version: `0.11`.

Supported services:
- Api
- Certificate
- Consumer
- Plugin
- Sni
- Target
- Upstream

Requires at least PHP 5.6.


Install
=======

This library can be installed with composer:

````sh
composer require smalot/kong-api
````

Usage
=====

````php
$factory = new \Smalot\Kong\ServiceFactory();
/** @var \Smalot\Kong\Services\Api $service */
$service = $factory->get('api');
$response = $service->create(
  [
    'name' => $name,
    'uris' => '/ping',
    'upstream_url' => 'http://ping/',
  ]
);
$api = $response->json();
var_dump($api);
````
