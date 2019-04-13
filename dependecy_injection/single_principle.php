<?php
class Book {
 
    function getTitle() {
        return "A Great Book";
    }
 
    function getAuthor() {
        return "John Doe";
    }
 
    function turnPage() {
        // pointer to next page
    }
 
    function getCurrentPage() {
        return "current page content";
    }
 
}
 
class SimpleFilePersistence {
 
    function save(Book $book) {
        $filename = '/documents/' . $book->getTitle() . ' - ' . $book->getAuthor();
        return file_put_contents($filename, serialize($book));
    }
 
}

$file = new SimpleFilePersistence();

$carte = new Book();

$file->save($carte);


