<?php

namespace helpers;

/**
 * Class ArrayHelper
 * @package helpers
 */
class ArrayHelper
{
    /**
     * @param array $array
     * @param string $key
     * @param null|mixed $default
     * @return mixed
     */
    public static function getValue(array $array, $key, $default = null)
    {
        $parts = explode('.', $key);

        foreach ($parts as $part) {
            if (is_array($array) && array_key_exists($part, $array)) {
                $array = $array[$part];
            } else {
                return $default;
            }
        }

        return $array;
    }

    /**
     * @param array $array
     * @param string $key
     * @param mixed $value
     * @param bool $pushIfNotExists
     */
    public static function replace(array &$array, $key, $value, $pushIfNotExists = false)
    {
        if (array_key_exists($key, $array) || $pushIfNotExists) {
            $array[$key] = $value;
        }
    }
}
