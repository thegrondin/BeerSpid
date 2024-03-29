<?php

namespace Website\Libs\BeerSpid\Libs;

class Config {

    public static $baseDir = DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR;

    public static function get(string $filename) {
        $path = __BEER_SPID_BASE_PATH__ . self::$baseDir;

        return json_decode(file_get_contents($path . $filename, true));
    }
}
