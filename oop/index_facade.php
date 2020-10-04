<?php

require "vendor/autoload.php";

use facade\Book;
use facade\CaseReverseFacade;

function writeln($line_in) {
    echo $line_in . "<br>";
}

writeln('BEGIN TESTING FACADE PATTERN');
writeln('');

$book = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

writeln('Original book title: ' . $book->getTitle());
writeln('');

$bookTitleReversed = CaseReverseFacade::reverseStringCase($book->getTitle());

writeln('Reversed book title: ' . $bookTitleReversed);
writeln('');

writeln('END TESTING FACADE PATTERN');


