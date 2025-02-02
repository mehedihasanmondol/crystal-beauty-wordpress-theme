<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb44a9b29498e482bd3c0e20f3341c378
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\Packages\\' => 16,
        ),
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\Packages\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb44a9b29498e482bd3c0e20f3341c378::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb44a9b29498e482bd3c0e20f3341c378::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb44a9b29498e482bd3c0e20f3341c378::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitb44a9b29498e482bd3c0e20f3341c378::$classMap;

        }, null, ClassLoader::class);
    }
}
