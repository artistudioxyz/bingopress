<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54425312666a14e373df2bcf8e3750c8
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit54425312666a14e373df2bcf8e3750c8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54425312666a14e373df2bcf8e3750c8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54425312666a14e373df2bcf8e3750c8::$classMap;

        }, null, ClassLoader::class);
    }
}
