<?php

namespace Controllers;

use Helpers\CommonHelper;

class BaseController
{
    public function __construct(){

    }

    /*
     * Function return basePath of the project
     *
     * */
    public function basePath(){
        $commonHelper = new CommonHelper();
        return $commonHelper::getProjectBasePath();
    }

}