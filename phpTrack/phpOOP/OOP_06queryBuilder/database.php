<?php

class Database
{
    protected $connection;

    public function __construct()
    {
        define('DB_HOST', 'localhost');
        
        define('DB_USER', 'root');

        define('DB_PASS', '');
    }

    public function connect($dbName)
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, $dbName);

        if ($this->connection->connect_errno) 
        {
            die("Failed to connect to MySQL: (" . $this->connection->connect_errno . "), " . $this->connection->connect_error);
        }
        else
        {
            return $this->connection;
        }
    }

}

//CLIENT CLASS
class Client extends Database
{
    public function __construct($dbName)
    {
        $this->connect($dbName);
    }

    public function where($param)
    {
        foreach($param as $key => $value)
        {
            $this->param = "WHERE $key = '$value'";

            return $this;
        }
    }

    public function get()
    {
        $this->statement = "SELECT * FROM clients $this->param";
   
        $this->result = $this->connection->query($this->statement);

        return $this->result = $this->result->fetch_all(MYSQLI_ASSOC);
    }
}

//SITE CLASS

class Site extends Database
{
    public $count;

    public function __construct($dbName)
    {
        $this->connect($dbName);
    }

    public function select($selectParam=[])
    {
        $this->count = current($selectParam);

        $this->selectParam = implode(" ", $selectParam);

        return $this;
    }

    public function groupBy($groupParam)
    {
        $this->groupParam = " GROUP BY $groupParam";
    }

    public function having($count, $op, $val)
    {
        return $this->having = "HAVING COUNT($count) $op $val";
    }

    public function get()
    {
        $this->statement = "SELECT $this->selectParam, COUNT($this->count) AS count
        FROM sites
        $this->groupParam
        $this->having";
   
        $this->result = $this->connection->query($this->statement);

        return $this->result = $this->result->fetch_all(MYSQLI_ASSOC);
    }
}
