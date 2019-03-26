<?php

namespace App\Analytics;

use App\Interfaces\AnalyticInterface;
use App\Interfaces\CrawlerInterface;
use App\Interfaces\FormatableInterface;
use App\Traits\InitiableTrait;

class CrawlerAnalytic implements AnalyticInterface, FormatableInterface
{

    use InitiableTrait;

    /**
     * @var string
     */
    private $key = 'crawlers';

    /**
     *
     * @var array
     */
    private $config = [
        \App\Analytics\Crawlers\GoogleCrawler::class,
        \App\Analytics\Crawlers\BingCrawler::class,
        \App\Analytics\Crawlers\BaiduCrawler::class,
        \App\Analytics\Crawlers\YandexCrawler::class,
    ];

    /**
     * @var CrawlerInterface[]
     */
    private $crawlers = [];

    /**
     * @var array
     */
    private $data = [];

    /**
     * CrawlerAnalytic constructor.
     * @throws \App\Exceptions\ErrorClassDoesNotImplement
     * @throws \App\Exceptions\ErrorClassDoesNotExist
     */
    public function __construct()
    {
        $this->crawlers = $this->initMultiple(CrawlerInterface::class, $this->config);
    }

    /**
     * @param string $line
     */
    public function parse(string $line): void
    {
        if (preg_match('#"([^"]+)"$#', $line, $match)) {

            $agent = $match[1];

            foreach ($this->crawlers as $crawler) {

                if (!array_key_exists($crawler->getFiledKey(), $this->data)) {
                    $this->data[$crawler->getFiledKey()] = 0;
                }

                if ($crawler->check($agent)) {
                    $this->data[$crawler->getFiledKey()]++;
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getFiledKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getFieldData()
    {
        return $this->data;
    }

}