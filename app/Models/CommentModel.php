<?php

namespace Models;

use Models\Migrations\Traits\BlogQueryBuilder;

class CommentModel
{
    # presenter trait
    use BlogQueryBuilder;

    public function get(){
        //TODO get all data from the table based on limit and offset

    }
}