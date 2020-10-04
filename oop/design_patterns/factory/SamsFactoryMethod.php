<?php

namespace factory;

use factory\AbstractFactoryMethod;
use factory\OReillyPHPBook;
use factory\SamsPHPBook;
use factory\VisualQuickstartPHPBook;

class SamsFactoryMethod extends AbstractFactoryMethod {

    private $context = "Sams";

    function makePHPBook($param) {
        $book = NULL;
        switch ($param) {
            case "us":
                $book = new SamsPHPBook;
                break;
            case "other":
                $book = new OReillyPHPBook;
                break;
            case "otherother":
                $book = new VisualQuickstartPHPBook;
                break;
            default:
                $book = new SamsPHPBook;
                break;
        }
        return $book;
    }

}
