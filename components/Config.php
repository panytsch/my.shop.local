<?php

namespace components;

use helpers\ArrayHelper;

/**
 * Class Config
 * @package components
 */
class Config
{
    /**
     * @var array
     */
    private static $storage = [];

    /**
     * @param array $data
     */
    public static function addData(array $data)
    {
        self::$storage = array_merge(self::$storage, $data);
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return ArrayHelper::getValue(self::$storage, $key, $default);
    }
}