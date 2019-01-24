<?php

namespace Application\Controllers;

Class Frontend {

    public $view;

    function __construct() {
        $this->view = new \Application\Views\View();
    }

    /**
     * GẼRE L'AFFICHAGE DE INDEX.PHP
     */
    function index()
    {
        /***********************************************/
        //Exemple de récupération d'une page en base de données
        /***********************************************/

        $page_repository = new \Application\Models\PageRepository(); //on instancie un repository
        $page_db_data = $page_repository->read('accueil');

        //print_r($page_db_data);die;
        $page = new \Application\Models\Page( $page_db_data ); //on instancie un modèle page avec les données récupérées par le repository

        //On passe le modèle à la vue
        $this->view->setVar('page', $page);


        //Autre exemple pour passer des données à la View
        /***********************************************/
        //À compléter
        //On doit récupérer les articles depuis la base de données et les initialiser
        //puis les passer à la view
        /***********************************************/

        $articles_repository = new \Application\Models\ArticleRepository(); //on instancie un repository
        $articles_array = $articles_repository->all();
        $articles = [];
        foreach($articles_array as $article_db_values) {
            $articles[] = new \Application\Models\Article( $article_db_values ); 
        }

        // $articles = [];
        $this->view->setVar('articles_view', $articles);

        //On donne le nom de la vue que l'on veut appeler
        $this->view->setVar('view', 'frontend/accueil');
        
        //on appelle la template, qui va utiliser la view que l'on a choisie
        //La fonction render utilise template.php par défaut, mais on peut lui spécifier une autre template en paramètre
        echo $this->view->render();
    
    }

    /**
     * GẼRE L'AFFICHAGE DES PAGES
     * Affiche une page
     * @param String $name: l'url de la page (colonne)
     */
    function page($name = "accueil")
    {
        $page = new \Application\Models\Page([]);
        $this->view->setVar('page', $page);

        $this->view->setVar('view', 'frontend/'.$name);

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }

    /**
     * GẼRE L'AFFICHAGE DES PAGES CATÉGORIES
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
     * GẼRE L'AFFICHAGE D'UN ARTICLE
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

        $result = false;
        if(isset($_POST['email']))
        {
            //create repository object
            $newsletter = new \Application\Models\NewsletterRepository(); 
            //save data
            $result = $newsletter->create($_POST['email']);

            //pass message to view in case of success
        }

        $this->view->setVar('result', $result);

        $this->view->setVar('view', 'frontend/newsletter');

        //on appelle la template, qui va utiliser la view que l'on a choisie
        echo $this->view->render();
    }
}
