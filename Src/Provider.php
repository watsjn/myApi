<?php

namespace MyApi\Src;

/**
 * Interface Provider
 * @package Src
 */
interface Provider
{
    /**
     * @return mixed
     */
    public function getItems();

    /**
     * @var string $json
     * @return mixed
     */
    public function validateData($json);
}