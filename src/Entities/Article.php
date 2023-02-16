<?php

namespace App\Entities;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

class Article {
	#[Assert\NotBlank]
	private string $title;
	#[Assert\NotBlank]
	private string $text;
	#[Assert\NotBlank]
	private string $author;
	#[Assert\NotBlank]
	private int $view;
	#[Assert\Date]
	private DateTime $publicationDate;
	#[Assert\NotBlank]
	private string $image;

	private ?int $id;
	/**
	 * @param string $title
	 * @param string $text
	 * @param string $author
	 * @param int $view
	 * @param DateTime $publicationDate
	 * @param string $image
	 * @param int|null $id
	 */
	public function __construct(string $title, string $text, string $author, int $view, DateTime $publicationDate, string $image, ?int $id) {
		$this->id = $id;
		$this->title = $title;
		$this->text = $text;
		$this->author = $author;
		$this->view = $view;
		$this->publicationDate = $publicationDate;
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
}