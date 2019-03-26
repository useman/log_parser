<?php

namespace App\Analytics\Crawlers;

use App\Interfaces\CrawlerInterface;

class GoogleCrawler implements CrawlerInterface
{

    /**
     * @var string
     */
    private $key = 'Google';

    /**
     * @param string $agent
     * @return bool
     */
    public function check(string $agent): bool
    {
        return preg_match('#(Googlebot)#', $agent);
    }

    /**
     * @return string
     */
    public function getFiledKey(): string
    {
        return $this->key;
    }

}