<?php

namespace MyApi\Src\Utils;

/**
 * Api
 * Class CallAPI
 * @package Src\Utils
 */
abstract class CallAPI
{
    /**
     * Method POST
     */
    const POST_METHOD = "POST";

    /**
     * Method PUT
     */
    const PUT_METHOD = "PUT";

    /**
     * Method GET
     */
    const GET_METHOD = "GET";

    /**
     * Curl resource
     * @var false|resource
     */
    private $curl;

    /**
     * @var string
     */
    private $url;

    /**
     * CallAPI constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->curl = \curl_init();

        \curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            "cache-control: no-cache"
        ));
        \curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        $this->url = $url;
    }

    /**
     * @param $method
     * @param null $data
     * @return bool|string
     * @throws \Exception
     */
    public function call($method, $data = null)
    {
        $url = $this->url;

        switch ($method) {
            case self::POST_METHOD:
                \curl_setopt($this->curl, CURLOPT_POST, 1);
                if ($data)
                    \curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
                break;
            case self::PUT_METHOD:
                \curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, self::PUT_METHOD);
                if ($data)
                    \curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = \sprintf("%s?%s", $this->url, \http_build_query($data));
        }

        \curl_setopt($this->curl, CURLOPT_URL, $url);
        $result = \curl_exec($this->curl);

        if (!$result) {

            throw new \Exception("API: Connection fail");
        }

        return $result;

    }

    /**
     * Close connection
     */
    public function close()
    {
        curl_close($this->curl);
    }
}