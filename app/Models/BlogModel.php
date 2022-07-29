<?php

namespace Models;

class BlogModel
{
    # presenter trait
    use \Models\Migrations\Traits\BlogQueryBuilderTrait;

    public function get(){
        //TODO get all data from the table based on limit and offset

        return $this->query("select * from users")->fetchArray();

    }
}