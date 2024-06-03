<?php

namespace src;

class BaseImporter
{
    private $title;
    private $description;
    private $link;
    private $pubDate;

    public function __construct($title, $description, $link, $pubDate) {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->pubDate = $pubDate;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLink() {
        return $this->link;
    }

    public function getPubDate() {
        return $this->pubDate;
    }
}