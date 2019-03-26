<?php

namespace App\Analytics\Crawlers;

use App\Interfaces\CrawlerInterface;

class YandexCrawler implements CrawlerInterface
{

    /**
     * @var string
     */
    private $key = 'Yandex';

    /**
     * @param string $agent
     * @return bool
     */
    public function check(string $agent): bool
    {
        return preg_match('#(YandexBot)#', $agent);
    }

    /**
     * @return string
     */
    public function getFiledKey(): string
    {
        return $this->key;
    }

}