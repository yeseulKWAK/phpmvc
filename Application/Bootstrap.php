<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Identifiants de la base de données
 * 데이터베이스 아이디
 */
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','blog');
DEFINE('DB_USER','root');
DEFINE('DB_PWD','');

/**
 * Base URL du site pour générer des liens dans l'application
 * 어플리케이션에 링크를 만들기 위한 사이트의 베이스 URL 
 */
$base_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/';
DEFINE('BASE_URL',$base_url);


/**
 * Chargement automatique des classes
 * 클래스의 자동 로드
 */
function autoload($class)
{
    //네임스페이스와 함께 불리는 클래스의 이름은 "Application\Models\Post" 타입이다.
    //substr 함수를 사용하여 \ 다음의 마지막 파트를 잘라낼 수 있음
    //le nom de la class appellée avec le namespace est du type "Application\Models\Post". Avec la fonction substr on récupère la dernière partie du nom, après le \
    $class = substr($class, strrpos($class, '\\') + 1); 

    //파일이 존재하는지 확인하고, 존재하면 Models에 포함시킨다
    //on vérifie que le fichier existe et si oui on l'inclut
    if (is_file('Application/Models/'.$class . '.php')) {
        require_once 'Application/Models/'.$class . '.php';
    } 
    
    //파일이 존재하는지 확인하고, 존재하면 Views에 포함시킨다
    //on vérifie que le fichier existe et si oui on l'inclut
    if (is_file('Application/Views/'.$class . '.php')) {
        require_once 'Application/Views/'.$class . '.php';
    } 
    
    //파일이 존재하는지 확인하고, 존재하면 Controllers에 포함시킨다
    //on vérifie que le fichier existe et si oui on l'inclut
    if (is_file('Application/Controllers/'.$class . '.php')) {
        require_once 'Application/Controllers/'.$class . '.php';
    } 
}
spl_autoload_register('autoload'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on essaie d'instancier une classe non déclarée.
//오토로드에 함수를 저장한다. 이는 정의되지 않은 클래스를 인스턴스화하려고 하는 순간부터 불리워지도록 위함이다.
