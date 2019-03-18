<?php

namespace MyApi\Src\Utils;

/**
 * Offers API
 * @package Src\Utils
 */
class OfferCallApi extends CallAPI
{
    /**
     * OfferCallApi constructor.
     */
    public function __construct()
    {
        parent::__construct("https://demo.appmanager.pl/api/v1/ads");
    }

    /**
     * @return bool|string
     * @throws \Exception
     */
    public function getOffers()
    {
        $result = $this->call(self::GET_METHOD);

        return $result;
    }
}