<?php

use Acme\Book;
use Acme\BookInterface;
use Acme\Kindle;
use Acme\eReaderAdapter;
use Acme\Nook;

require __DIR__ . '/../vendor/autoload.php';

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new Book);
(new Person)->read(new eReaderAdapter(new Kindle));
(new Person)->read(new eReaderAdapter(new Nook));