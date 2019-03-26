<?php

namespace App\Analytics;

use App\Interfaces\AnalyticInterface;
use App\Interfaces\FormatableInterface;

class TrafficAnalytic implements AnalyticInterface, FormatableInterface
{

    /**
     * @var string
     */
    private $key = 'traffic';

    /**
     * @var int
     */
    private $traffic = 0;

    /**
     * @param string $line
     */
    public function parse(string $line): void
    {
        if (preg_match('#[0-9]{3}\s([0-9]+)\s"#', $line, $match)) {

            $bytes = $match[1];

            $this->traffic += $bytes;
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
        return $this->traffic;
    }

}