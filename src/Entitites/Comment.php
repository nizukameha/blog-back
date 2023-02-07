<?php

namespace App\Entities;

use DateTime;

class comment {

    /**
     * @param int|null $id
     * @param string $name
     * @param string $text
     * @param DateTime $publication_date
     * @param int $id_article
     */
    public function __construct(private ?int $id, private string $name, private string $text, private DateTime $publication_date, private int $id_article) {
    	$this->id = $id;
    	$this->name = $name;
    	$this->text = $text;
    	$this->publication_date = $publication_date;
    	$this->id_article = $id_article;
    }
    
	/**
	 * @return int|null
	 */
	public function getId(): ?int {
		return $this->id;
	}
	
	/**
	 * @param int|null $id 
	 * @return self
	 */
	public function setId(?int $id): self {
		$this->id = $id;
		return $this;
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
	public function getPublication_date(): DateTime {
		return $this->publication_date;
	}
	
	/**
	 * @param DateTime $publication_date 
	 * @return self
	 */
	public function setPublication_date(DateTime $publication_date): self {
		$this->publication_date = $publication_date;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getId_article(): int {
		return $this->id_article;
	}
	
	/**
	 * @param int $id_article 
	 * @return self
	 */
	public function setId_article(int $id_article): self {
		$this->id_article = $id_article;
		return $this;
	}
}