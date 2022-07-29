<?php

/*
 * This file contains two operations execute and drop you need to base
 * in your command what action you need to perform
 *
 * e.g below
 *
 * php app/Models/Migrations/migrate.php Post_Table_Migration_001 execute
 * php app/Models/Migrations/migrate.php Post_Table_Migration_001 drop
 *
 * */

array_shift($argv);
$className = array_shift($argv);
$funcExecuteDrop = array_shift($argv);

switch ($className) {
    case 'Post_Table_Migration_001':
        if (php_sapi_name() == 'cli'){
            $postObj = new \Models\Migrations\Post_Table_Migration_001();
            echo $postObj->{$funcExecuteDrop}();
        }
        break;
    case 'Comment_Table_Migration_001':
        if (php_sapi_name() == 'cli'){
            $postObj = new \Models\Migrations\Comment_Table_Migration_001();
            echo $postObj->{$funcExecuteDrop}();
        }
        break;
    default:
        echo "No migration found!!!";
}