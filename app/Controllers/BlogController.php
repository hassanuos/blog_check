<?php

namespace Controllers;

use Helpers\CommonHelper;
use Models\BlogModel;

class BlogController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    /*
     * Function List all the blog Posts
     * return type array []
     * */
    public function indexAction(){

        $blogPosts = new BlogModel();
        print_r($blogPosts->get());exit();

    }

    /*
     * Function create post
     * return type boolean (true / false)
     * */
    public function createAction(){
        return $this->basePath();
    }

    /*
     * Function edit post
     * return type array []
     * */
    public function editAction($id){

    }

    /*
     * Function delete post
     * return type boolean(true / false)
     * */
    public function deleteAction($id){

    }

}