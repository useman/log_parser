<?php

namespace App\Analytics;

use App\Interfaces\AnalyticInterface;
use App\Interfaces\FormatableInterface;

class HTTPCodeAnalytic implements AnalyticInterface, FormatableInterface
{

    /**
     * @var string
     */
    private $key = 'statusCodes';

    /**
     * @var array
     */
    private $statusCodes = [];

    /**
     * @param string $line
     */
    public function parse(string $line): void
    {
        if (preg_match('#"\s([0-9]{3})\s#', $line, $match)) {

            $statusCode = $match[1];

            if (!array_key_exists($statusCode, $this->statusCodes)) {
                $this->statusCodes[$statusCode] = 0;
            }

            $this->statusCodes[$statusCode]++;
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
        return $this->statusCodes;
    }

}