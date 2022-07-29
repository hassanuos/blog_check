<?php

namespace Controllers;

use Helpers\CommonHelper;

class BaseController
{
    protected $commonHelper;
    public $content;

    public function __construct(){
        $this->commonHelper = new CommonHelper();
    }

    /*
     * Function return basePath of the project
     *
     * */
    public function basePath(){
        return $this->commonHelper->getProjectBasePath();
    }

    public function getJsAssetsBundle(){
        return $this->commonHelper->getJsAssets($this->basePath());
    }

    public function getCssAssetsBundle(){
        return $this->commonHelper->getCssAssets($this->basePath());
    }

    public function getProjectFolder(){
        return $this->commonHelper->getAbsolutePath($this->basePath());
    }

    public function getNavigationBar(){
        return $this->commonHelper->getNavigations($this->basePath());
    }

}