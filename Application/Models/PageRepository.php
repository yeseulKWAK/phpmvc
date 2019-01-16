<?php

namespace Application\Models;

require_once("Repository.php");

class PageRepository extends Repository
{
    function create() {

    }

    /**
     * Récupère unage page dans la base de données
     */
    function read($name) {
        return $this->db->query('SELECT * FROM posts WHERE post_type="page" AND post_name="'.$name.'"')->fetch(\PDO::FETCH_ASSOC);
    }

    function update($name) {

    }

    function delete($name) {

    }

    function all($categories = array()) {
        
    }
}