<?php

namespace helpers;

/**
 * Class SessionHelper
 * @package helpers
 */
class SessionHelper
{
    /**
     * @param string $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        self::initSession();

        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        self::initSession();

        return ArrayHelper::getValue($_SESSION, $key, $default);
    }

    /**
     * @param string $key
     * @param mixed $data
     */
    public static function addFlash($key, $data)
    {
        self::initSession();

        $_SESSION['flashes'][$key] = $data;
    }

    /**
     * @param string $key
     * @param bool $clearAfterAccess
     * @return mixed
     */
    public static function getFlash($key, $clearAfterAccess = true)
    {
        self::initSession();

        $flash = ArrayHelper::getValue($_SESSION, "flashes.{$key}");
        if ($flash && $clearAfterAccess) {
            unset($_SESSION['flashes'][$key]);
        }

        return $flash;
    }

    public static function initSession()
    {
        if (empty(session_id())) {
            session_start();
        }
    }
}
