<?php

class Config {

    public static string $baseDir = "/config/"

    public static function get(string $filename) {
        $path = __BEER_SPID_BASE_PATH__ . self::$baseDir;

        return json_decode(file_get_contents($path . $filename, true));
    }
}
