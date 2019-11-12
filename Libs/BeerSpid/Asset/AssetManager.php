<?php


namespace Website\Libs\BeerSpid\Asset;


use Website\Libs\BeerSpid\Asset\Contracts\IAssetManager;
use Website\Libs\BeerSpid\Asset\Contracts\IBasicAsset;
use Website\Libs\BeerSpid\Libs\Url;

class AssetManager implements IAssetManager
{
    function __construct() {}
    public function exists(string $requestUri): bool
    {;
        $path = Url::parseUrl($requestUri);

        return (bool) array_filter(AssetCollection::getAll(), function (AbstractAsset $asset) use ($requestUri) {
            return $asset->getPath() === $requestUri;
        });

    }

    public function handle(string $requestUri)
    {
        // TODO: Implement handle() method.
    }

    public function isAsset(string $path): bool
    {
        // TODO: Implement exists() method.
    }



}