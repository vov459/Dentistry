<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc576e98adc5ef96e069f328a9e87c0e2
{
    public static $files = array (
        '62c2e96f4a21fd11d8a5e6b920aebfdb' => __DIR__ . '/../..' . '/settings.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'View\\' => 5,
        ),
        'R' => 
        array (
            'Repository\\' => 11,
        ),
        'M' => 
        array (
            'Model\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'View\\' => 
        array (
            0 => __DIR__ . '/../..' . '/view',
        ),
        'Repository\\' => 
        array (
            0 => __DIR__ . '/../..' . '/repository',
        ),
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc576e98adc5ef96e069f328a9e87c0e2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc576e98adc5ef96e069f328a9e87c0e2::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc576e98adc5ef96e069f328a9e87c0e2::$classMap;

        }, null, ClassLoader::class);
    }
}
