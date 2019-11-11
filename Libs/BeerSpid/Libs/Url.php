<?php

namespace Website\Libs\BeerSpid\Libs;

class Url {

    /*public static function normalize(string $url) {

    	if (substr($url, -1) !== '/') {
    		$url = $url . '/';
		}

        return $url;
    }*/

    public static function parseUrl(string $url) {

    	$path = (strpos($url, '?') !== false ? explode('?', $url, 2) : (array) $url)[0];
    	$path = substr($path, - 1) !== '/' ? $path . '/' : $path;

		return $path;
	}
}