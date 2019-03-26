<?php

namespace App\Formats;

use App\Interfaces\FormatableInterface;
use App\Interfaces\FormatInterface;

class JSONFormat extends FormatAbstract implements FormatInterface
{

    /**
     * @param FormatableInterface[] $arr
     * @return mixed
     */
    public function convert(array $arr)
    {
        $result = [];

        foreach ($arr as $item) {
            $result[$item->getFieldKey()] = $item->getFieldData();
        }

        $jsonResult = json_encode($result, JSON_PRETTY_PRINT);

        return $jsonResult;
    }

}