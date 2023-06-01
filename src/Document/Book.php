<?php

declare(strict_types=1);

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as Mongo;

#[Mongo\Document(collection: "books")]
class Book
{
    #[Mongo\Id]
    private string $id;

    #[Mongo\Field(type: "string")]
    private string $title;

    #[Mongo\Field(type: "string")]
    private string $author;

    public function getId(): string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }
}