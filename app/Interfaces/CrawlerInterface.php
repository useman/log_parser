<?php

namespace App\Interfaces;

interface CrawlerInterface
{

    /**
     * @return string
     */
    public function getFiledKey(): string;

    /**
     * @param string $agent
     * @return bool
     */
    public function check(string $agent): bool;

}