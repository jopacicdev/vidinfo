<?php namespace Josip\Vidinfo\Parsers;

/**
 * Interface IParser
 * @package Josip\Vidinfo\Parsers
 */
interface IParser {

    /**
     * @param $url
     * @return mixed
     */
    public function setUrl($url);

    /**
     * @return mixed
     */
    public function getVideoData();

}