<?php

namespace MyApi\Src;

use MyApi\Src\Utils\OfferCallApi as OfferCallApi;
use MyApi\Src\Entity\Offer as Offer;

/**
 * Offers api implementation
 * @package Src
 */
class OffersProvider implements Provider
{
    /**
     * @var OfferCallApi
     */
    private $api;

    /**
     * OffersProvider constructor.
     */
    public function __construct()
    {
        $this->api = new OfferCallApi();
    }

    /**
     * Get offers from API
     * @return Offer[]
     * @throws \Exception
     */
    public function getItems()
    {
        $offers = array();

        $resultArray = \json_decode($this->api->getOffers(), true);

        foreach($resultArray['data'] as $data) {

            $offer = new Offer();
            $offer->setId($data['id']);
            $offer->setCities($data['cities']);
            $offer->setTitle($data['content']['title']);

            array_push($offers, $offer);
        }

        return $offers;
    }

    /**
     * Data validation
     * @var string $json
     * @throws \Exception
     * @return string
     */
    public function validateData($json) {

        if (!$json['success']) {
            throw new \Exception("API: Not successful data transfer");
        }

        if (!isset($json['data'])) {
            throw new \Exception("API: Missing 'data' section");
        }
    }
}