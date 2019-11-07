<?php

namespace Website\Libs\BeerSpid\Libs;

class Path {

    public static function normalize($oldPath) {
        $path = str_replace(['\\', '/'], DIRECTORY_SEPARATOR, $oldPath);

        if (substr($path, -1) !== DIRECTORY_SEPARATOR) {
            $path .= DIRECTORY_SEPARATOR;
        }

        return $path;
    }

    public static function getStatic($path) {
        if (substr($path, 0) !== DIRECTORY_SEPARATOR) {
            $path = DIRECTORY_SEPARATOR . $path;
        }

        return __WEBSITE_BASE_DIR__ . $path;
    }

    public static function getNormalizedStatic($path) {
        return Path::normalize(Path::getStatic($path));
    }

}