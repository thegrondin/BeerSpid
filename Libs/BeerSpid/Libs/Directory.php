<?php

namespace Website\Libs\BeerSpid\Libs;

class Directory {
    public static function getFiles($path) {


        $files = array_diff(scandir($path), array('..', '.'));

        foreach ($files as $index => &$file) {
            $file = $path . $file;
        }

        return $files;
    }
}