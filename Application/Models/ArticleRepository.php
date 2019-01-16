<?php

namespace Application\Models;

require_once("Repository.php");

class ArticleRepository extends Repository
{
    function create() {

    }

    function read() {

    }

    function update() {

    }

    function delete() {

    }

    function all($categories = array()) {
        $sth = $this->db->prepare('SELECT * FROM posts WHERE post_type="article"');
        $sth->execute();
        return $sth->fetchAll();
    }
}