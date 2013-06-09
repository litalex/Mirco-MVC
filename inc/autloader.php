<?php
/**
 * @author Dirk Merten
 */


spl_autoload_register(function ($class) {
    if (strpos($class, 'mmvc') === 0) {
        $base = dirname(dirname(__FILE__));
        $path = str_replace('\\', '/', $class);
        include $base . '/lib/' . $path . '.php';
    }
});
