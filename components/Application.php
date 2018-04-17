<?php

namespace components;

/**
 * Class Application
 * @package components
 */
abstract class Application
{
    public function __construct(array $config)
    {
        Config::addData($config);
    }

    abstract public function run();

    /**
     * @var null|Database
     */
    private static $db = null;

    /**
     * @return Database
     */
    public static function getDb()
    {
        if (null === self::$db) {
            self::$db = new Database(
                Config::get('db.host'),
                Config::get('db.user'),
                Config::get('db.password'),
                Config::get('db.db_name')
            );
        }

        return self::$db;
    }
}
