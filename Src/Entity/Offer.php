<?php

namespace MyApi\Src\Entity;

/**
 * Offer entity
 * @package Src\Entity
 */
class Offer
{
    /**
     * Id
     * @var string
     */
    private $id;

    /**
     * Title
     * @var string
     */
    private $title;

    /**
     * Cities Array
     * @var array
     */
    private $cities;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return array
     */
    public function getCities()
    {
        return $this->cities;
    }

    /**
     * @param array $cities
     */
    public function setCities($cities)
    {
        $this->cities = $cities;
    }
}