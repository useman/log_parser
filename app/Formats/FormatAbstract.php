<?php

namespace App\Formats;

use App\Exceptions\ErrorClassDoesNotImplement;
use App\Interfaces\FormatableInterface;

abstract class FormatAbstract
{

    private $implementInterface = FormatableInterface::class;

    /**
     * @param FormatableInterface[] $implements
     * @throws ErrorClassDoesNotImplement
     */
    public function check(array $implements): void
    {
        foreach ($implements as $implement) {
            if (!in_array($this->implementInterface, class_implements($implement))) {

                $className = get_class($implement);

                throw new ErrorClassDoesNotImplement("Error: class {$className} does not implement '{$this->implementInterface}'");
            }
        }
    }
}