<?php

namespace App\Interfaces;

interface FormatableInterface
{

    /**
     * @return string
     */
    public function getFieldKey(): string;

    /**
     * @return mixed
     */
    public function getFieldData();

}