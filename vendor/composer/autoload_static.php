<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit286071297c5a8b2b122b6732e8e669e5
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Website\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Website\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit286071297c5a8b2b122b6732e8e669e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit286071297c5a8b2b122b6732e8e669e5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
