<?php

namespace App\Interfaces;

interface FormatInterface
{

    /**
     * @param FormatableInterface[] $arr
     * @return mixed
     */
    public function convert(array $arr);

}