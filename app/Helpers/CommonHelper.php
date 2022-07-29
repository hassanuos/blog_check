<?php

namespace Helpers;

class CommonHelper
{
    static $helper;

    public function __construct(){
        self::$helper = parse_ini_file(PROJECT_PATH . "config.ini", true);
    }

    static function getDBCredentials() {
        return is_array(self::$helper['database']) ? self::$helper['database'] : [];
    }

    public function getProjectBasePath() {
        return is_array(self::$helper['project']) ? self::$helper['project']['base_url'] : '#';
    }

    static function getBlogTitle() {
        return is_array(self::$helper['blog_info']) ? self::$helper['blog_info']['title'] : '';
    }

    static function getBlogTagLine() {
        return is_array(self::$helper['blog_info']) ? self::$helper['blog_info']['tag_line'] : '';
    }

    public function getJsAssets($basePath){

        $js = [
            $basePath . '/app/Views/assets/js/bootstrap.min.js',
            $basePath . '/app/Views/assets/js/jquery.min.js',
            $basePath . '/app/Views/assets/js/script.js',
        ];

        $jsScript = array_map(function ($url) {
            return '<script src="'.$url.'" type="text/javascript"></script>';
        }, $js);

        return $jsScript;
    }

    public function getCssAssets($basePath){

        $css = [
            $basePath . '/app/Views/assets/css/bootstrap.min.css',
            $basePath . '/app/Views/assets/css/style.css',
        ];

        $cssScript = array_map(function ($url) {
            return '<link rel="stylesheet" href="'.$url.'">';
        }, $css);

        return $cssScript;
    }

    public function getNavigations($basePath){

        $navigation = [
            [
                'name' => 'Home',
                'url' => $basePath,
                'seo_description' => 'Check21 home page',
                'is_new_tab' => false,
            ],
            [
                'name' => 'Posts',
                'url' => $basePath."/index.php/blog/index",
                'seo_description' => '',
                'is_new_tab' => false,
            ],
            [
                'name' => 'About Us',
                'url' => $basePath."/index.php/blog/index",
                'seo_description' => '',
                'is_new_tab' => false,
            ],
            [
                'name' => 'Contact Us',
                'url' => $basePath."/index.php/blog/index",
                'seo_description' => '',
                'is_new_tab' => false,
            ],
        ];


        return $navigation;
    }

    public function getAbsolutePath($basePath){
        return $_SERVER['DOCUMENT_ROOT'] ."/". basename($basePath);
    }

}