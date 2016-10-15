<?php

require 'vendor/autoload.php';

use Acme\Book;
use Acme\BookInterface;
use Acme\eReaderAdapter;
use Acme\Kindle;
use Acme\Nook;

class Person {
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

// We can help our Person "adapt" to read() using various devices without
// having to change their methods of reading (i.e. open(), turnPage())

$person = new Person;
// Person -> read a book
$person->read(new Book);

// Person -> read a Kindle
$person->read(new eReaderAdapter(new Kindle));

// Person -> read a Nook
$person->read(new eReaderAdapter(new Nook()));
