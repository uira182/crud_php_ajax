<?php

class Conexao {

    public static $instance;
    private $host;
    private $user;
    private $password;
    private $database;

    private function __construct() {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "agenda";
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->user, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }
        return self::$instance;
    }

}

?>