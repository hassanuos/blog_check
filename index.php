<?php

const PROJECT_PATH = __DIR__ . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR;
include_once PROJECT_PATH."autoload.php";

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );

array_walk($uri, function(&$v, $k) use (&$uri){
    $v = trim($v);
    if ($v == '')
        unset($uri[$k]);
});
$uri = array_values($uri);

if (is_array($uri) && !isset($uri[2])){
    $defaultPath = \Helpers\CommonHelper::getProjectBasePath() . '/index.php/blog/index';
    header("Location: ".$defaultPath);
}else{
    $className = ucfirst($uri[2])."Controller";
    if (!file_exists(PROJECT_PATH . "Controllers". DIRECTORY_SEPARATOR .$className.".php")){
        header("HTTP/1.1 404 Not Found");
        exit();
    }

    $moduleName = DIRECTORY_SEPARATOR."Controllers". DIRECTORY_SEPARATOR .ucfirst($uri[2])."Controller";
    $objFeedController = new $moduleName();

    $strMethodName = $uri[3] . 'Action';
    if (!method_exists($objFeedController, $strMethodName)){
        header("HTTP/1.1 404 Not Found");
        exit();
    }
    $objFeedController->{$strMethodName}();
}



