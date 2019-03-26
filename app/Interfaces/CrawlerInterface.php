<?php

namespace App\Interfaces;

interface CrawlerInterface
{

    /**
     * @return string
     */
    public function getFieldKey(): string;

    /**
     * @param string $agent
     * @return bool
     */
    public function check(string $agent): bool;

}