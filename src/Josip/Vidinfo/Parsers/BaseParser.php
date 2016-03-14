<?php namespace Josip\Vidinfo\Parsers;

/**
 * Class BaseParser
 * @package Josip\Vidinfo\Parsers
 */
abstract class BaseParser implements IParser
{
    /**
     * @var
     */
    protected $url;

    /**
     * @var
     */
    protected $videoId;

    /**
     * @param $message
     * @throws \Exception
     */
    protected function respondWithError($message)
    {
        throw new \Exception($message);
    }

    /**
     * @param $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
}