<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd8682522c06c22079e6849389ce7da38
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Public\\' => 7,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'Admin\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Public\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/public',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Admin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app/admin',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd8682522c06c22079e6849389ce7da38::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd8682522c06c22079e6849389ce7da38::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd8682522c06c22079e6849389ce7da38::$classMap;

        }, null, ClassLoader::class);
    }
}
