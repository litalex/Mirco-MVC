<?php
/**
 * @author Dirk Merten
 */


spl_autoload_register(function ($class) {
    if (strpos($class, 'dmerten') === 0) {
        $path = 'lib/' . str_replace('\\', '/', $class);
        include $path . '.php';
    }
});
