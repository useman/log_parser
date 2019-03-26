<?php

namespace App\Interfaces;

interface FormatableInterface
{

    /**
     * @return string
     */
    public function getFiledKey(): string;

    /**
     * @return mixed
     */
    public function getFieldData();

}