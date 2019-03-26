<?php

namespace App\Analytics;

use App\Interfaces\AnalyticInterface;
use App\Interfaces\FormatableInterface;

class ViewAnalytic implements AnalyticInterface, FormatableInterface
{

    /**
     * @var string
     */
    private $key = 'views';

    /**
     * @var int
     */
    private $views = 0;


    /**
     * @param string $line
     * @return void
     */
    public function parse(string $line): void
    {
        if (strlen($line) > 10) {
            $this->views++;
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
        return $this->views;
    }

}