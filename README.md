# README

This provides a library for the uh.cx link shortening service.

## Installation

Via composer:
```composer require jeboehm/uhcx-php-lib 0.1```

## Usage

``` php
$link = \UhCx\Manager\Shortener::shorten('http://your.long.url.example.com/');
echo $link->getRedirect();
```

## More information

For more information visit http://uh.cx/

Have fun!
