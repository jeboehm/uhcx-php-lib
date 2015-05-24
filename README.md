# README

This provides a library for the uh.cx link shortening service.

[![Build Status](https://travis-ci.org/jeboehm/uhcx-php-lib.svg?branch=master)](https://travis-ci.org/jeboehm/uhcx-php-lib)

## Installation

Via composer:
``` shell
composer require jeboehm/uhcx-php-lib dev-master
```

## Usage

``` php
$link = \UhCx\Manager\Shortener::shorten('http://your.long.url.example.com/');
echo $link->getRedirect();
```

## More information

For more information visit http://uh.cx/

Have fun!
