<?php

class MYSQLIClient extends Database
{

    public function __construct($host, $db_user, $db_password, $db_name,)
    {
        parent::__construct($host, $db_name, $db_user, $db_password);
    }

    public function connect()
    {

        $this->_handeler = new mysqli($this->host, $this->db_user, $this->db_password, $this->db_name);

        if ($this->_handeler->connect_error) {
            die("Connection failed: " . $this->_handeler->connect_error);
        }
        return $this;
    }

    public function get()
    {
        return json_decode(json_encode($this->statment->fetch_all(MYSQLI_ASSOC)));
    }
}
