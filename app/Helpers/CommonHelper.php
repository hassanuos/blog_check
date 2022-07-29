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

    static function getProjectBasePath() {
        return is_array(self::$helper['project']) ? self::$helper['project']['base_url'] : [];
    }

}