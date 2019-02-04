<?php

namespace helpers;

class Autoload {

    public static function init() {
        include('../vendor/autoload.php');
        spl_autoload_register([Autoload::class, 'autoloader']);
    }

    public static function autoloader($class) {
        $path = __DIR__ . '/../' . sprintf('%s.php', $class);
        $path = realpath($path);
        if (file_exists($path)) {
            require($path);
        }
    }

}
