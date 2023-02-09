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
                $comments[] = $this->sqlToComment($item);
            }
            return $comments;
        }
        return null;
    }

    public function findById($id):?Comment {
        $statement = $this->connection->prepare("SELECT * FROM comment WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        $result = $statement->fetch();
        if ($result) {
            return $this->sqlToComment($result);
        }
        return null;
    }

    private function sqlToComment(array $line):Comment {
        $publicationDate = null;
        if(isset($line['publication_date'])){
            $publicationDate = new DateTime($line['publication_date']);
        }
        return new Comment($line['name'], $line['text'], $publicationDate, $line['id_article'], $line['id']);
    }

}