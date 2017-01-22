<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2939b26e72e74504a5be889bc86c01e
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2939b26e72e74504a5be889bc86c01e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2939b26e72e74504a5be889bc86c01e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
