<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 02-Sep-17
 * Time: 6:37 PM
 */

//error_reporting(0);
@session_start();

class DBH
{
    private static $_instance = null;
    private $_pdo,
        $_connection;

    public $pdo;


    private function __construct()
    {
        try {
            $this->_pdo = new PDO("mysql:host=localhost;dbname=rfp", "root", "");

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Magic method clone is empty to prevent duplication of connection

    public static function getInstance()
    {
        if (!isset(self::$_instance)) {
            self::$_instance = new DBH();
        }
        return self::$_instance;
    }

    public function getConnection()
    {
        return $this->_connection;
    }

    public function CRUD($sql)
    {
        return $this->_pdo->query($sql);
    }
}