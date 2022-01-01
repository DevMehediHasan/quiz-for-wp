<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit32147f169366372b4f3bf867d4596901
{
    public static $files = array (
        '0695a4e2d751a5939de6fb3cff9a849d' => __DIR__ . '/../..' . '/includes/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mehedi\\BeatnikQuiz\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mehedi\\BeatnikQuiz\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit32147f169366372b4f3bf867d4596901::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit32147f169366372b4f3bf867d4596901::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit32147f169366372b4f3bf867d4596901::$classMap;

        }, null, ClassLoader::class);
    }
}