<?php

namespace Website\Libs\BeerSpid\Libs;

class File {
    public static function getContent($path) {
        return file_get_contents($path, true);
    }

    public static function parseToJson($content) {
        try {
            return json_decode($content, false);
        }
        catch (\Exception $ex) {
            trigger_error(
                "Impossible to parse file into json format.\nERROR: " . $ex,
                E_USER_NOTICE
            );
        }
    }
}