<?php

namespace Application\Controllers;

Class Frontend {

    public $view;

    function __construct() {
        $this->view = new \Application\Views\View();
    }

    /**
     * Affiche la page d'accueil
     */
    function index()
    {

        $page_repository = new \Application\Models\PageRepository(); //on instancie un repository
        $page = new \Application\Models\Page( $page_repository->read('accueil') ); //on instancie un modèle page avec les données récupérées par le repository

        $this->view->setVar('page', $page);

        //Exemple pour passer des données à la View
        $posts = ['un article', 'un autre article']; //ceci devrait être remplacer par des articles récupérés depuis la base de données
        $this->view->setVar('posts', $posts);

        //On donne le nom de la view que l'on veut appeler
        $this->view->setVar('view', 'frontend/accueil');

        //on appelle la template, qui va utiliser la view que l'on a choisie
        //La fonction render utilise template.php par défaut, mais on peut lui spécifier une autre template en paramètre
        echo $this->view->render();
    
    }

    /**
     * Affiche une page
     * @param String $name: l'url de la page (colonne)
     */
    function page($name = "accueil")
    {
        $this->view->setVar('view', 'frontend/accueil'.$name);

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche la page des articles
     * @param String $category : Permet de trier les articles par catégorie
     */
    function articles($category = null) {

        /***********************************************/
        //À compléter
        //On doit récupérer les articles depuis la base de données et les initialiser
        //puis les passer à une view
        /***********************************************/


        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche la page d'un article
     * @param String $name : Le nom de l'article à afficher
     */
    function article($name = null) {

        /***********************************************/
        //À compléter
        //On doit récupérer l'article depuis la base de données puis l'initialiser
        //puis le passer à une view
        /***********************************************/


        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Affiche et traite le formulaire de contact
     */
    function contact() {

        /***********************************************/
        //À compléter
        //On doit appeler le formulaire s'il n'y a pas de $_POST
        //S'il y a du $_POST, on doit le vérifier, l'enregistrer en base de données puis afficher un message
        /***********************************************/

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * Traite le formulaire de newsletter
     */
    function newsletter() {

        /***********************************************/
        /***********************************************/

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }
}
