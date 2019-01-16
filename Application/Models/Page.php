<?php

namespace Application\Models;

class Page extends Post
{

    function __construct($values) {
        $this->title = $values['post_title'];
        $this->content = $values['post_content'];
    }

    //Getter & Setters différent?
    //Par exemple, ici on va utiliser le post_name comme nom de fichier

}