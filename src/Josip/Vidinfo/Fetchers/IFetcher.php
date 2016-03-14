<?php namespace Josip\Vidinfo\Fetchers;

/**
 * Interface IFetcher
 * @package Josip\Vidinfo\Fetchers
 */
interface IFetcher {

    /**
     * @return mixed
     */
    public function getVideoInfo();

}