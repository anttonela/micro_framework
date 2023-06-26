<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac39de08e4604b09670deac72252847b
{
    public static $files = array (
        '7b43e7494e8d43b65b21fcb3798c1b14' => __DIR__ . '/..' . '/windwalker/utilities/src/bootstrap.php',
        '24020a79a0a8c780b1c6496f886d688a' => __DIR__ . '/..' . '/windwalker/renderer/src/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'library\\' => 8,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
        'W' => 
        array (
            'Windwalker\\Utilities\\' => 21,
            'Windwalker\\Renderer\\' => 20,
        ),
        'P' => 
        array (
            'PlugRoute\\' => 10,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'E' => 
        array (
            'EasyRoute\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'library\\' => 
        array (
            0 => __DIR__ . '/../..' . '/library',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Windwalker\\Utilities\\' => 
        array (
            0 => __DIR__ . '/..' . '/windwalker/utilities/src',
        ),
        'Windwalker\\Renderer\\' => 
        array (
            0 => __DIR__ . '/..' . '/windwalker/renderer/src',
        ),
        'PlugRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/erandir/plug-route/src',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'EasyRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/easy-route/easy-route/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac39de08e4604b09670deac72252847b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac39de08e4604b09670deac72252847b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitac39de08e4604b09670deac72252847b::$classMap;

        }, null, ClassLoader::class);
    }
}