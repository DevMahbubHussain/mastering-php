
<?php

abstract class Database
{
    protected $_handeler;
    protected $statment;
    protected $host, $db_name, $db_user, $db_password;

    public function __construct($host, $db_name, $db_user, $db_password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->db_password = $db_password;
        $this->db_user = $db_user;
    }

    abstract public function connect();

    public function select($sql)
    {
        $this->statment = $this->_handeler->query($sql);
        return $this;
    }

    public function getConnection()
    {
        return $this->_handeler;
    }

    abstract public function get();
}
