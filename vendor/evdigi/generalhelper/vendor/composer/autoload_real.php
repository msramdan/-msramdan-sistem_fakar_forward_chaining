<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfe81a8520d20aabba2ffccb2b68d8d18
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

        spl_autoload_register(array('ComposerAutoloaderInitfe81a8520d20aabba2ffccb2b68d8d18', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfe81a8520d20aabba2ffccb2b68d8d18', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfe81a8520d20aabba2ffccb2b68d8d18::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}