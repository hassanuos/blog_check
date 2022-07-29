<?php

spl_autoload_register(function ($className){
    $filePath = __DIR__ . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . $className.".php";
    if (!file_exists($filePath)) {
        include_once str_replace("\\", "/", $className) . ".php";
    }
});