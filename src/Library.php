<?php

declare(strict_types=1);

namespace Practica\Test;


class Library
{


    private $id;

    private $name;

    private $readers;

    private $books;



    public function __construct(string $id, string $name, array $readers,  array $books)
    {

        $this->id = $id;
        $this->name = $name;
        $this->readers = [];
        $this->books = [];
    }


    public function addReader(Reader $reader)
    {

        $this->readers[$reader->idReader()] = $reader;
    }

    public function addBook(Book $book)
    {

        $this->books[$book->idBook()] = $book;
    }


    public function borrowLibrary(Book$book):string
    {
        if (isset($this->books[$book->idBook()]) && $book->isAvailable()) {
            $book->lend();
            return "Libro {$book->idBook()} prestado";
        }
        return "El libro no esta disponible";
    }


    public function returnLibrary(Book $book)
    {

        foreach ($this->books as $key => $books) {
            if ($books->idBook() === $book->idBook()) {
                unset($this->books[$key]);
                $books->return();
                break;
            }
        }
    }
}
