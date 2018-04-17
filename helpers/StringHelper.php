<?php

namespace helpers;

/**
 * Class StringHelper
 * @package helpers
 */
class StringHelper
{
    /**
     * @param string $string
     * @param string $delimiter
     * @return string
     */
    public static function camelize($string, $delimiter = '-')
    {
        $result = '';
        foreach (explode($delimiter, $string) as $part) {
            $result .= ucfirst(strtolower($part));
        }

        return $result;
    }

    /**
     * @param string $string
     * @param string $chars
     * @return mixed
     */
    public static function rtrim($string, $chars)
    {
        return rtrim($string, " \t\n\r\0\x0B{$chars}");
    }
}