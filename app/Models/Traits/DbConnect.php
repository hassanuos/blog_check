<?php

namespace Models\Migrations\Traits;

class DbConnect
{
    use BlogQueryBuilder;

    protected $connection;
    protected $query;
    protected $show_errors = TRUE;
    protected $query_closed = TRUE;
    public $query_count = 0;

    public function __construct() {

        if(!isset($connection)) {
            $databaseConfigs = new \Helpers\CommonHelper();
            $this->connection = new mysqli($databaseConfigs['servername'], $databaseConfigs['username'], $databaseConfigs['password'], $databaseConfigs['dbname']);
        }

        if ($this->connection->connect_error) {
            $this->error('Failed to connect to MySQL - ' . $this->connection->connect_error);
        }

        $this->connection->set_charset($databaseConfigs['charset']);
    }

}