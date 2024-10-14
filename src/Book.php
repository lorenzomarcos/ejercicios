<?php declare(strict_types=1);

namespace Practica\Test;

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\Exception;

class Book
{

    private  string $title;

    private  string $author;

    private  string $id;

    private bool $available;


    public function __construct(string $title, string  $author,)
    {
        $this->title = $title;
        $this->author = $author;
        $this->id = Uuid::uuid4()->toString(); //generar un uudi al crear un libro, pero no se como funciona? 
        $this->available = true;
    }

    public function titleBook()
    {
        return $this->title;
    }

    public function authorBook()
    {
        return $this->author;
    }

    public function idBook()
    {
        return $this->id;
    }
    public function isAvailable()
    {
        return $this->available;
    }


    public function lend()
    {
        if ($this->available) {
            $this->available = false;
        }
        throw new Exception("El libro '{$this->title}' esta prestado vuelve luego");
    }
    public function return()
    {

        if ($this->available) {
            $this->available = true;
        }
        throw new Exception("El libro '{$this->title}' ya se ecnuentra  disponible");
    }

    /*public function showInfo(){

    $available = $this->available ? 'disponible' : 'Prestado';
    return "titulo : {$this->title}, Autor:{$this->author},ID: {$this->id}, Estado: {$available}";
}*/
}



class Reader
{
    private string $name;
    private string $id;

    private array $borrowedBooks;

    public function __construct(string $name,)
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
        }
        throw new Exception("No puedes prestar el libro {$book->titleBook()} por que ya no esta disponible");
    }

    public function returnBook(Book $book)
    {

        if (isset($this->borrowedBooks[$book->idBook()])) {
            $book->return(); //metodo devolver de libro 
            unset($this->borrowedBooks[$book->idBook()]); //y aqui elimino el libro en teoria
        }
        throw new Exception("No sea tomado prestado el libro {$book->titleBook()}");
    }

    public function borrowedBooks(): array
    {

        return $this->borrowedBooks;
    }

    public function showBorrowedBooks()
    {                   //mostras lista de libros prestados o no se ?

        if ($this->borrowedBooks) {
            return "{$this->name} no ha tomando ningun libro pendiente con eso";
        }

        $listBook = "Los libros prestados por {$this->name}";
        foreach ($this->borrowedBooks as $book) {
            $listBook = $book->showInfo();
        }
        return $listBook;     
    }
}
