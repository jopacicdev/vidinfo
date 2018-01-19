# VidInfo - Oembed Video Info
[![Build Status](https://travis-ci.org/jopacicdev/vidinfo.svg?branch=master)](https://travis-ci.org/jopacicdev/vidinfo)

Vidinfo package takes `$url` parameter and returns video info via oembed urls from the following service providers:

  - YouTube
  - Vimeo



# Install via Composer
```sh
$ composer require josip/vidinfo dev-master
```



### Usage

Use it in static fashion:

```php
\Josip\Vidinfo\Vidinfo::getVideoInfo($url)
```
in order to return array or JSON string, add in the optional second argument:

```php
\Josip\Vidinfo\Vidinfo::getVideoInfo($url, $returnType)
```

The `$returnType` var can be: `object`, `array`, `json`. Falls back to `array`.


License
----

Free as in *free* beer.


