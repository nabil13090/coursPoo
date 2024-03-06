<?php
// $model = new \Model\Comment();

// $commentaires = $model->findall(); // connexion a MySQL : 1
// $commentaires = $model->find(); connexion a MySQL : 1
// $model->delete(1); connexion a MySQL : 1

// tous sa grace a if(self::$instance  == null) {
    // self::$instance car elle l'instencifie une seul fois . 



// retourne la connexion a la base de données 
class Database
{

    private static $instance = null;



    public static function getPdo(): PDO 
{
    if(self::$instance  == null) {
    self::$instance = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    return self::$instance;


}

}


}