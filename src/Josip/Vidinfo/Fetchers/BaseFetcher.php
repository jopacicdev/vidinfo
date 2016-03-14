<?php namespace Josip\Vidinfo\Fetchers;

/**
 * Class BaseFetcher
 * @package Josip\Vidinfo\Fetchers
 */
abstract class BaseFetcher implements IFetcher {

    /**
     * @var
     */
    protected $oembedUrl;

    /**
     * @var
     */
    protected $videoId;


}