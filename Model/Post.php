<?php

class Post
{
    private $title;
    private $date;
    private $content;
    private $authorName;

    public function __construct($title, $content, $date, $authorName)
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->authorName = $authorName;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getName()
    {
        return $this->authorName;
    }

    public function createEntryArray($title, $content, $date, $authorName): array
    {
        return ["title" => $this->getTitle(), "content" => $this->getContent(), "date" => $this->getDate(), "name" => $this->getName()];
    }


}