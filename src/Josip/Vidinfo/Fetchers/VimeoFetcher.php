<?php namespace Josip\Vidinfo\Fetchers;


/**
 * Class VimeoFetcher
 * @package Josip\Vidinfo\Fetchers
 */
final class VimeoFetcher extends BaseFetcher
{
    /**
     * @var string
     */
    protected $oembedUrl = 'https://vimeo.com/api/oembed.json?url=http://vimeo.com/';

    /**
     * VimeoFetcher constructor.
     * @param $videoId
     */
    public function __construct($videoId)
    {
        $this->videoId = $videoId;
    }

    /**
     * @return array
     */
    public function getVideoInfo()
    {
        $result = $this->__getJSONData( $this->__compileOembedUrl() );

        $output = [
            'author' => $result['author_name'],
            'title' => $result['title'],
            'thumbnail_url' => $result['thumbnail_url'],
        ];

        return $output;
    }

    /**
     * @param $url
     * @return mixed
     */
    private function __getJSONData($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    /**
     * @return string
     */
    private function __compileOembedUrl()
    {
        return $this->oembedUrl . $this->videoId;
    }
}