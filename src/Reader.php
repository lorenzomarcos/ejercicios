<?php

declare(strict_types=1);

namespace Practica\Test;

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\Exception;

class Reader
{
    private string $name;
    private string $id;

    private array $borrowedBooks;

    public function __construct(string $name, )
    {
        $this->name = $name;
        $this->id = Uuid::uuid4()->toString(); //generar un uudi al crear un lector, pero no se como funciona?
        $this->borrowedBooks = [];
    }

    public function nameReader()
    {

        return $this->name;
    }


    public function idReader()
    {
        return $this->id;
    }

    public function borrow(Book $book)
    {
        if ($book->isAvailable()) {
            $book->lend(); //aqui estoy llamando al metodo prestar de la clase libro
            $this->borrowedBooks[$book->idBook()] = $book; //estoy agregando un libro a la lista del pana lector
            return;
        }
    }

    public function returnBook(Book $book)
    {

        if (isset($this->borrowedBooks[$book->idBook()])) {
            $book->return(); //metodo devolver de libro 
            unset($this->borrowedBooks[$book->idBook()]); //y aqui elimino el libro en teoria
            return;
        }
    }

    public function borrowedBooks(): array
    {

        return $this->borrowedBooks;
    }

    public function showBorrowedBooks()
    {                   //mostras lista de libros prestados o no se ?

        if (empty($this->borrowedBooks)) {
            return "{$this->name} no ha tomando ningun libro pendiente con eso";
        }

        $listBook = "Los libros prestados por {$this->name}:\n";
        foreach ($this->borrowedBooks as $book) {
            $listBook .= $book->showInfo() . "\n";
        }
        return $listBook;
    }
}
