<?php

namespace helpers;

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
}
