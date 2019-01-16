<?php

namespace Application\Models;

class Repository
{
    protected $db;

    function __construct() {
        $this->db = $this->connexion();
    }

    protected function connexion()
    {
        try {

            $db = new \PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        return $db;
    }
}