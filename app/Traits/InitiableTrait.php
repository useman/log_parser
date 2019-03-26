<?php

namespace App\Traits;

trait InitiableTrait
{

    /**
     * @param string $interface
     * @param array $implementClassNames
     * @return array
     * @throws \App\Exceptions\ErrorClassDoesNotImplement
     * @throws \App\Exceptions\ErrorClassDoesNotExist
     */
    private function initMultiple(string $interface, array $implementClassNames)
    {
        $result = [];

        foreach ($implementClassNames as $implementClassName) {
            try {
                $implement = new $implementClassName;
            } catch (\Exception $e) {
                throw new \App\Exceptions\ErrorClassDoesNotExist("Error: class does not exist '{$implementClassName}' -> {$e->getMessage()}", 1, $e);
            }

            if (!in_array($interface, class_implements($implement))) {
                throw new \App\Exceptions\ErrorClassDoesNotImplement("Error: class '{$implementClassName}' does not implement '{$interface}'");
            }

            $result[] = $implement;
        }

        return $result;
    }

    /**
     * @param string $interface
     * @param $implementClassName
     * @return mixed
     * @throws \App\Exceptions\ErrorClassDoesNotExist
     * @throws \App\Exceptions\ErrorClassDoesNotImplement
     */
    private function initOne(string $interface, $implementClassName)
    {
        try {
            $implement = new $implementClassName;
        } catch (\Exception $e) {
            throw new \App\Exceptions\ErrorClassDoesNotExist("Error: class does not exist '{$implementClassName}'", 1, $e);
        }

        if (!in_array($interface, class_implements($implement))) {
            throw new \App\Exceptions\ErrorClassDoesNotImplement("Error: class {$implementClassName} does not implement '{$interface}'");
        }

        return $implement;
    }

}