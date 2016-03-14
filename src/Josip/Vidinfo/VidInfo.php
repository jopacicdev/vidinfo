<?php namespace Josip\Vidinfo;

use Josip\Vidinfo\Parsers\VimeoParser;
use Josip\Vidinfo\Parsers\YoutubeParser;

/**
 * Class VidInfo
 * @package Josip\Vidinfo
 */
class VidInfo {

    /**
     * @var
     */
    protected $url;

    /**
     * @var
     */
    protected $realm;

    /**
     * @var
     */
    protected $videoId;


    /**
     * @param $url
     * @param string $returnType
     * @return mixed|string
     * @throws \Exception
     */
    public static function getVideoInfo($url, $returnType = 'array')
    {
        $realmParser = self::determineRealm($url);

        return self::respondWithType( $realmParser->getVideoData(), $returnType );
    }

    /**
     * @param $url
     * @return VimeoParser|YoutubeParser
     * @throws \Exception
     */
    private static function determineRealm($url)
    {
        try
        {
            $parse = parse_url($url);

            $host = $parse['host'];

            if ( strpos( $host, 'youtube' ) !== false )
            {
                $p = new YoutubeParser($url);
                return $p;
            }
            else if ( strpos( $host, 'vimeo') !== false )
            {
                $p = new VimeoParser($url);
                return $p;
            }
            else
            {
                throw new \Exception('Could not determine video provider.');
            }
        }
        catch (\Exception $e)
        {
            throw new \Exception('Yeah, I need a valid url.');
        }

    }

    /**
     * @param $getVideoData
     * @param $returnType
     * @return mixed|string
     */
    private static function respondWithType($getVideoData, $returnType)
    {
        switch($returnType)
        {
            case 'array':
                return $getVideoData;
            case 'object':
                return json_decode(json_encode($getVideoData));
            case 'json':
                return json_encode($getVideoData);
            default:
                return $getVideoData;
        }
    }



}