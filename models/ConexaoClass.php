<?php

class ConexaoClass extends MySQLi {

    public $host, $user, $password, $database,$port, $connection;

    public function __construct() {
        $this->host = 'localhost'; //$_SERVER['RDS_HOSTNAME'];
        $this->user = 'root'; //$_SERVER['RDS_USERNAME'];
        $this->port = 3306; //$_SERVER['RDS_PORT'];
        $this->password = 'root'; //$_SERVER['RDS_PASSWORD'];
        $this->database = 'dbmercurio'; //$_SERVER['RDS_DB_NAME'];
        $this->connect_me();
    }

    private function connect_me() {
        $this->connection = $this->connect($this->host, $this->user, $this->password, $this->database, $this->port);
        if ($this->connect_error) {
            die($this->connect_error);
        }
    }

    // Utilizado para Select
    public function selecionarDados($comandoSQL) {
        $result = $this->query($comandoSQL);

        if ($this->error) {
            return $this->error;
        } else {
            $index = 0;
            while ($row = $result->fetch_assoc()) {
                $data[$index] = $row;
                $index++;
            }
            if (isset($data)) {
                return $data;
            } else {
                return "ERRO";
            }
        }
    }

    //Utilizado para Insert, Delet e Update
    public function executarComandoSQL($comandoSQL) {
        $this->query($comandoSQL);
        if ($this->error) {
            return $this->error;
        } else {
            return true;
        }
    }

}
