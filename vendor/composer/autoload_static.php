<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8e51ce57ffbdf230c2ad0abd6fbf0100
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'F' => 
        array (
            'Farmconnect\\Project\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'Farmconnect\\Project\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8e51ce57ffbdf230c2ad0abd6fbf0100::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8e51ce57ffbdf230c2ad0abd6fbf0100::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8e51ce57ffbdf230c2ad0abd6fbf0100::$classMap;

        }, null, ClassLoader::class);
    }
}
