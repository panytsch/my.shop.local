<?php

namespace helpers;

/**
 * Class ResponseHelper
 * @package helpers
 */
class ResponseHelper
{
    /**
     * @param string $url
     * @param int $code
     * @param bool $terminate
     */
    public static function redirect($url, $code = 301, $terminate = true)
    {
        header("Location: {$url}", $code);
        if ($terminate) {
            exit;
        }
    }
}
