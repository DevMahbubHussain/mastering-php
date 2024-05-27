<?php

class PDOClient extends Database
{
    protected $dsn;

    public function __construct($driver, $host, $db_name, $db_user, $db_password)
    {
        parent::__construct($host, $db_name, $db_user, $db_password);

        $this->dsn = "{$driver}:host={$host};dbname={$db_name}";
    }

    public function connect()
    {
        try {
            $this->_handeler = new PDO($this->dsn, $this->db_user, $this->db_password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this;
    }

    public function get()
    {
        return $this->statment->fetchAll(PDO::FETCH_OBJ);
    }
}
