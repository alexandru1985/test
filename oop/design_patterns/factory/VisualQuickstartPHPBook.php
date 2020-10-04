<?php

namespace factory;
use factory\AbstractBook;

class VisualQuickstartPHPBook extends AbstractBook {

    private $author;
    private $title;

    function __construct() {
        $this->author = 'Larry Ullman';
        $this->title = 'PHP for the World Wide Web';
    }

    function getAuthor() {
        return $this->author;
    }

    function getTitle() {
        return $this->title;
    }

}
