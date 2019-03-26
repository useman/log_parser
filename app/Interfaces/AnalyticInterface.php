<?php

namespace App\Interfaces;

interface AnalyticInterface
{

    /**
     * @param string $line
     * @return void
     */
    public function parse(string $line): void;

}