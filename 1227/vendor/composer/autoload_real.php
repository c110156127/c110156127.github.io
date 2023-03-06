<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitceaccbc9ceef365fd73a64b85391c9a6
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitceaccbc9ceef365fd73a64b85391c9a6', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitceaccbc9ceef365fd73a64b85391c9a6', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitceaccbc9ceef365fd73a64b85391c9a6::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}