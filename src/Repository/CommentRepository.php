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

    public function persist(Comment $comment) {
        $statement = $this->connection->prepare("INSERT INTO comment (name, text, publication_date, id_article) VALUES (:name, :text, :publication_date, :id_article)");
        $statement->bindValue("name", $comment->getName());
        $statement->bindValue("text", $comment->getText());
        $statement->bindValue("publication_date", $comment->getPublicationDate()->format("Y-m-d"));
        $statement->bindValue("id_article", $comment->getIdArticle());

        $statement->execute();

        $comment->setId($this->connection->lastInsertId());
    }

    public function update(Comment $comment) {
        $statement = $this->connection->prepare("UPDATE comment SET name = :name, text = :text, publication_date = :publication_date, id_article = :id_article WHERE id=:id");
        $statement->bindValue("name", $comment->getName());
        $statement->bindValue("text", $comment->getText());
        $statement->bindValue("publication_date", $comment->getPublicationDate()->format("Y-m-d"));
        $statement->bindValue("id_article", $comment->getIdArticle());
        $statement->bindValue("id", $comment->getId(), PDO::PARAM_INT);

        $statement->execute();
    }

    public function delete(Comment $comment) {
        $statement = $this->connection->prepare("DELETE FROM comment WHERE id=:id");
        $statement->bindValue("id", $comment->getId());

        $statement->execute();
    }

    private function sqlToComment(array $line):Comment {
        $publicationDate = null;
        if(isset($line['publication_date'])){
            $publicationDate = new DateTime($line['publication_date']);
        }
        return new Comment($line['name'], $line['text'], $publicationDate, $line['id_article'], $line['id']);
    }

}