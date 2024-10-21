<?php

declare(strict_types=1);

namespace Practica\Test;

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\Exception;

class Reader
{
    private  $name;
    private  $id;

    private  $borrowedBooks;

    public function __construct(string $name, string $id, array $borrowedBooks)
    {
        $this->name = $name;
        $this->id = $id; //generar un uudi al crear un lector, pero no se como funciona?
        $this->borrowedBooks = $borrowedBooks;
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
            $this->borrowedBooks[] = $book; //estoy agregando un libro a la lista del pana lector
            return;
        }
    }

    public function returnBook(Book $book)
    {

        foreach ($this->borrowedBooks as $key => $borrowedBook) {
            if ($borrowedBook->idBook() === $book->idBook()) {
                unset($this->borrowedBooks[$key]);
                $book->return();
                break;
            }
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
