<?php

namespace helpers;
use components\Config;

/**
 * Class FilesHelper
 * @package helpers
 */
class FilesHelper
{
    /**
     * @param string $dir
     * @param array $skip
     * @return array
     */
    public static function scanDir($dir, array $skip = [])
    {
        $skip = array_merge(['.', '..', '.gitignore'], $skip);
        return array_filter(scandir($dir), function ($item) use ($skip) {
            return !in_array($item, $skip);
        });
    }

    /**
     * @param string $id
     * @param string $temp
     * @param string $name
     */

    public static function moveById(string $id, string $temp, string $name){
        $targetDir = Config::get('filesStorage');
        if (!is_dir($targetDir)){
            mkdir($targetDir);
        }
        move_uploaded_file($temp, "{$targetDir}/{$name}");
    }
}
