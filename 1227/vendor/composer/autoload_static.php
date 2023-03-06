<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitceaccbc9ceef365fd73a64b85391c9a6
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\' => 7,
        ),
        'M' => 
        array (
            'Models\\' => 7,
            'Middlewares\\' => 12,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\' => 
        array (
            0 => 'C:\\xampp\\htdocs\\1227\\vendor',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/models',
        ),
        'Middlewares\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Middlewares',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
            1 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/Controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitceaccbc9ceef365fd73a64b85391c9a6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitceaccbc9ceef365fd73a64b85391c9a6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitceaccbc9ceef365fd73a64b85391c9a6::$classMap;

        }, null, ClassLoader::class);
    }
}