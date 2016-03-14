<?php namespace Josip\Vidinfo\Parsers;

use Josip\Vidinfo\Fetchers\YoutubeFetcher;

/**
 * Class YoutubeParser
 * @package Josip\Vidinfo\Parsers
 */
final class YoutubeParser extends BaseParser {

    /**
     * YoutubeParser constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->__determineVideoIdByUrl($url);
    }

    /**
     * @return array
     */
    public function getVideoData()
    {
        $f = new YoutubeFetcher($this->videoId);

        return $f->getVideoInfo();
    }

    /**
     * @param $url
     * @throws \Exception
     */
    private function __determineVideoIdByUrl($url)
    {

        $parts = parse_url($url);

        if ( !isset( $parts['query'] ) )
            $this->respondWithError('Video ID not present');

        parse_str($parts['query']);

        if ( !isset( $v ) )
            $this->respondWithError('Video ID not present');

        $this->videoId = $v;

    }

}