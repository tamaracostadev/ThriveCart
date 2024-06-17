<?php

// Create autoload function (classes are on App folder)

function autoload($class) {
    require  $class . '.php';
}

// Register autoload function

spl_autoload_register('autoload');



