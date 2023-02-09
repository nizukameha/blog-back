<?php

namespace App\Entities;

use DateTime;

class Comment {

	private string $name;
	private string $text;
	private DateTime $publicationDate;
	private int $idArticle;
	private ?int $id;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $text
     * @param DateTime $publication_date
     * @param int $id_article
     */
    public function __construct(string $name, string $text, DateTime $publicationDate, int $idArticle, ?int $id) {
		$this->name = $name;
		$this->text = $text;
		$this->publicationDate = $publicationDate;
		$this->idArticle = $idArticle;
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getText(): string {
		return $this->text;
	}
	
	/**
	 * @param string $text 
	 * @return self
	 */
	public function setText(string $text): self {
		$this->text = $text;
		return $this;
	}

	/**
	 * @return DateTime
	 */
	public function getPublicationDate(): DateTime {
		return $this->publicationDate;
	}
	
	/**
	 * @param DateTime $publicationDate 
	 * @return self
	 */
	public function setPublicationDate(DateTime $publicationDate): self {
		$this->publicationDate = $publicationDate;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getIdArticle(): int {
		return $this->idArticle;
	}
	
	/**
	 * @param int $idArticle 
	 * @return self
	 */
	public function setIdArticle(int $idArticle): self {
		$this->idArticle = $idArticle;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id 
	 * @return self
	 */
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
}