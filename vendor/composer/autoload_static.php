<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61de4f369701a55dc424186d884508d6
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit61de4f369701a55dc424186d884508d6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61de4f369701a55dc424186d884508d6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit61de4f369701a55dc424186d884508d6::$classMap;

        }, null, ClassLoader::class);
    }
}
