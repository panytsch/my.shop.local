<?php

namespace components;

/**
 * Class Autoload
 * @package components
 */
class Autoload
{
    /**
     * @var string
     */
    private $baseDir;

    /**
     * @var array
     */
    private $classesMap = [];

    /**
     * Autoload constructor.
     * @param string $baseDir
     * @param array $classesMap
     */
    public function __construct($baseDir, array $classesMap = [])
    {
        $this->baseDir = rtrim($baseDir, " \t\n\r \v/\\");
        $this->classesMap = $classesMap;
    }

    /**
     * @param $class
     * @throws \Exception
     */
    public function load($class)
    {
        $file = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        $rout = $this->baseDir . DIRECTORY_SEPARATOR . $file . '.php';

        if (!file_exists($rout)) {
            throw new \Exception("Class '{$class}' can not be loaded");
        }

        require_once $rout;
    }
}
