<?php

namespace App\Entities;

use DateTime;

class Article {
    
    /**
     * @param int|null $id
     * @param string $title
     * @param string $category
     * @param string $text
     * @param string $author
     * @param int $view
     * @param DateTime $publication_date
     * @param string $image
     */
    public function __construct(private ?int $id, private string $title, private string $category, private string $text, private string $author, private int $view, private DateTime $publication_date, private string $image) {
    	$this->id = $id;
    	$this->title = $title;
    	$this->category = $category;
    	$this->text = $text;
    	$this->author = $author;
    	$this->view = $view;
    	$this->publication_date = $publication_date;
    	$this->image = $image;
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
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @param string $title 
	 * @return self
	 */
	public function setTitle(string $title): self {
		$this->title = $title;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getCategory(): string {
		return $this->category;
	}
	
	/**
	 * @param string $category 
	 * @return self
	 */
	public function setCategory(string $category): self {
		$this->category = $category;
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
	 * @return string
	 */
	public function getAuthor(): string {
		return $this->author;
	}
	
	/**
	 * @param string $author 
	 * @return self
	 */
	public function setAuthor(string $author): self {
		$this->author = $author;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getView(): int {
		return $this->view;
	}
	
	/**
	 * @param int $view 
	 * @return self
	 */
	public function setView(int $view): self {
		$this->view = $view;
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
	 * @return string
	 */
	public function getImage(): string {
		return $this->image;
	}
	
	/**
	 * @param string $image 
	 * @return self
	 */
	public function setImage(string $image): self {
		$this->image = $image;
		return $this;
	}
}