<?php


namespace Website\Libs\BeerSpid\Asset;


use Website\Libs\BeerSpid\Asset\Contracts\IBasicAsset;

class AssetCollection
{

    private static $collection = [];

    public static function getSingle(string $name) : AbstractAsset {
        return array_filter(self::$collection, function (AbstractAsset $asset) use ($name) {
            return $asset->getName() === $name;
        })[0];
    }


    public static function getAllFrom(string $filter) : array {
        return array_filter(self::$collection, function (AbstractAsset $asset) use ($filter) {
           return $asset->getType() === $filter;
        });
    }

    public static function register(IBasicAsset $asset) : void {
        if (in_array($asset, self::$collection)) {
            self::$collection[] = $asset;
        }
    }

    public static function getAll() {
        return self::$collection;
    }
}