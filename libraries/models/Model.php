<?php

namespace Models;
require_once('libraries/database.php');



abstract class Model
{

    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this-> pdo = getPdo();
    }


    public function find(int $id ) {

     
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        // On exécute la requête en précisant le paramètre :article_id 
        $query->execute(['id' => $id]);
        
        // On fouille le résultat pour en extraire les données réelles de l'article
        $item = $query->fetch();
    
        return $item;
    
    }

    public function findAll(?string $order = "") : array {

        $sql= "SELECT * FROM {$this->table}";
        if($order){
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();
    
        return $articles;
    }

    public function delete(int $id) : void {
        $pdo = getPdo();
        $query = $pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    
    }

}