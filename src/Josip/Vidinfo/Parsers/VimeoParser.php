<?php namespace Josip\Vidinfo\Parsers;

use Josip\Vidinfo\Fetchers\VimeoFetcher;

/**
 * Class VimeoParser
 * @package Josip\Vidinfo\Parsers
 */
final class VimeoParser extends BaseParser
{
    /**
     * VimeoParser constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->__determineVideoIdByUrl($url);
    }

    /**
     * @param $url
     */
    private function __determineVideoIdByUrl($url)
    {
        $pattern = '/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/';

        preg_match($pattern, $url, $parts);

        $this->videoId = end($parts);

    }

    /**
     * @return array
     */
    public function getVideoData()
    {
        $f = new VimeoFetcher($this->videoId);

        return $f->getVideoInfo();
    }
}