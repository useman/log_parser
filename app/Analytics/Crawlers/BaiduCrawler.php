<?php

namespace App\Analytics\Crawlers;

use App\Interfaces\CrawlerInterface;

class BaiduCrawler implements CrawlerInterface
{

    /**
     * @var string
     */
    private $key = 'Baidu';

    /**
     * @param string $agent
     * @return bool
     */
    public function check(string $agent): bool
    {
        return preg_match('#(Baiduspider)#', $agent);
    }

    /**
     * @return string
     */
    public function getFiledKey(): string
    {
        return $this->key;
    }

}