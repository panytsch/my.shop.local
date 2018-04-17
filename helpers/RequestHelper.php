<?php

namespace helpers;

/**
 * Class RequestHelper
 * @package helpers
 */
class RequestHelper
{
    /**
     * @param string $key
     * @return mixed
     */
    public static function getHeader($key)
    {
        return ArrayHelper::getValue($_SERVER, "HTTP_{$key}");
    }

    /**
     * @return array
     */
    public static function getAllRequestData()
    {
        return $_REQUEST ?: [];
    }
}
