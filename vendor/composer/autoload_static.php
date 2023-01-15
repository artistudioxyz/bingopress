<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite5d79fc40b2127073c475e80fe4f7234
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'BingoPress\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'BingoPress\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite5d79fc40b2127073c475e80fe4f7234::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite5d79fc40b2127073c475e80fe4f7234::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite5d79fc40b2127073c475e80fe4f7234::$classMap;

        }, null, ClassLoader::class);
    }
}
