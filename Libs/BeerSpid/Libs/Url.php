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
        return (strpos($url, '?') !== false ? explode('?', $url, 2) : (array) $url)[0];
	}

	public static function normalize(string $url) {
        return substr($url, - 1) !== '/' ? $url . '/' : $url;
    }
}