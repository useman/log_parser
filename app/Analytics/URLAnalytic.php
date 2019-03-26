<?php

namespace App\Analytics;

use App\Interfaces\AnalyticInterface;
use App\Interfaces\FormatableInterface;

class URLAnalytic implements AnalyticInterface, FormatableInterface
{

    /**
     * @var string
     */
    private $key = 'urls';

    /**
     * @var array
     */
    private $urls = [];

    /**
     * @param string $line
     */
    public function parse(string $line): void
    {
        if (preg_match('#"[A-Z]+\s(.*?)\s#', $line, $match)) {

            $path = $match[1];

            if (!array_key_exists($path, $this->urls)) {
                $this->urls[$path] = true;
            }
        }
    }

    /**
     * @return string
     */
    public function getFieldKey(): string
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    public function getFieldData()
    {
        return count($this->urls);
    }

}