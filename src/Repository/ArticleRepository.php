<?php

namespace App\Repository;

use App\Entities\Article;
use DateTime;
use PDO;

class ArticleRepository{

    private PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct() {
    	$this->connection = Database::connect();
    }

    public function findAll() {
        $articles = [];

        $statement = $this->connection->prepare("SELECT * FROM article");
        $statement->execute();
        $result = $statement->fetchAll();

        if ($result) {
            foreach ($result as $item) {
                $articles[] = $this->sqlToArticle($item);
            }
            return $articles;
        }
        return null;
    }

    public function findById($id):?Article {
        $statement = $this->connection->prepare("SELECT * FROM comment WHERE id=:id");
        $statement->bindValue("id", $id);
        $statement->execute();
        $result = $statement->fetch();
        if ($result) {
            return $this->sqlToArticle($result);
        }
        return null;
    }
    public function persist(Article $article) {
        $statement = $this->connection->prepare("INSERT INTO article (title, text, author, view, publication_date, image) VALUES(:title, :text, :author, :view, :publication_date, :image)");
        $statement->bindValue("title", $article->getTitle());
        $statement->bindValue("text", $article->getText());
        $statement->bindValue("author", $article->getAuthor());
        $statement->bindValue("view", $article->getView());
        $statement->bindValue("publication_date", $article->getPublicationDate()->format("Y-m-d"));
        $statement->bindValue("image", $article->getImage());
        $statement->execute();
        $article->setId($this->connection->lastInsertId());
    }

    private function sqlToArticle (array $line) : Article{
        $publicationDate = null;
        if(isset($line['publication_date'])) {
            $publicationDate = new DateTime($line['publication_date']);
        }
        return new Article($line['title'], $line['text'], $line['author'], $line['view'], $publicationDate, $line['image'], $line['id']);
    }

}