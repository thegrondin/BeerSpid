<?php


namespace Website\Libs\BeerSpid\Asset;


use Website\Libs\BeerSpid\Asset\Contracts\AssetTypes;
use Website\Libs\BeerSpid\Asset\Contracts\IBasicAsset;

abstract class AbstractAsset implements IBasicAsset
{
    protected const TYPE = AssetTypes::NONE;

    public function getType()
    {
        return self::TYPE;
    }
}