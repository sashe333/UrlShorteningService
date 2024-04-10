<?php

namespace App\Domain\URL\Interfaces;

interface UrlShortenerInterface
{
    /**
     * @param string $url
     * @return string
     * @throws \InvalidArgumentException
     */
    public function shorten($url);
}
