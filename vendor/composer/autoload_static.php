<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite835f777974f0c8b35dc503a533af08e
{
    public static $files = array (
        '3f8bdd3b35094c73a26f0106e3c0f8b2' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/SendGrid.php',
        '31a7cf013d73a96bec3a5977a94ebccd' => __DIR__ . '/..' . '/shark/simple_html_dom/simple_html_dom.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SendGrid\\Stats\\' => 15,
            'SendGrid\\Mail\\' => 14,
            'SendGrid\\Contacts\\' => 18,
            'SendGrid\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SendGrid\\Stats\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/stats',
        ),
        'SendGrid\\Mail\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail',
        ),
        'SendGrid\\Contacts\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts',
        ),
        'SendGrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/php-http-client/lib',
            1 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static $classMap = array (
        'simple_html_dom' => __DIR__ . '/..' . '/shark/simple_html_dom/simple_html_dom.php',
        'simple_html_dom_node' => __DIR__ . '/..' . '/shark/simple_html_dom/simple_html_dom.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite835f777974f0c8b35dc503a533af08e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite835f777974f0c8b35dc503a533af08e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite835f777974f0c8b35dc503a533af08e::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite835f777974f0c8b35dc503a533af08e::$classMap;

        }, null, ClassLoader::class);
    }
}
