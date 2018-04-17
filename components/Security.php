<?php

namespace components;

/**
 * Class Security
 * @package components
 */
class Security
{
    /**
     * @param string $hash
     * @param string $key
     * @param array $data
     * @return bool
     */
    public static function isValidHash($hash, $key, array $data)
    {
        $string = json_encode($data) . $key;
        $secret = md5($string);

        return $secret === $hash;
    }
}
