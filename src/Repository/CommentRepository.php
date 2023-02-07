<?php

namespace App\Repository;

use App\Entities\Comment;
use DateTime;
use PDO;

class CommentRepository {

    private PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct() {
    	$this->connection = Database::connect();
    }

    public function findAll() {
        //Tableau qui contiendra le résultat de la requête
        $comments = [];

        $statement = $this->connection->prepare("SELECT * FROM comment");
        $statement->execute();
        $result = $statement->fetchAll();
        //Si la table n'est pas vide
        if ($result) {
            foreach ($result as $item) {
                $comments[] = $item;
            }
            return $comments;
        }
        return null;
    }
}