<?php

namespace App\Analytics\Crawlers;

use App\Interfaces\CrawlerInterface;

class BingCrawler implements CrawlerInterface
{

    /**
     * @var string
     */
    private $key = 'Bing';

    /**
     * @param string $agent
     * @return bool
     */
    public function check(string $agent): bool
    {
        return preg_match('#(Bingbot)#', $agent);
    }

    /**
     * @return string
     */
    public function getFieldKey(): string
    {
        return $this->key;
    }

}