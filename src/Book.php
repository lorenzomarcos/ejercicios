<?php

declare(strict_types=1);

namespace Practica\Test;


use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\Exception;

class Book
{

    private   $title;

    private   $author;

    private   $id;

    private  $available;


    public function __construct(string $title, string  $author, string $id, bool $available)
    {
        $this->title = $title;
        $this->author = $author;
        $this->id = $id; //generar un uudi al crear un libro, pero no se como funciona? 
        $this->available = $available;
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
    }
    public function return()
    {

        if ($this->available == false) {
            $this->available = true;
        }
    }

    public function showInfo()
    {

        $available = $this->available ? 'disponible' : 'Prestado';
        return "Titulo: {$this->title}, Autor: {$this->author}, ID: {$this->id}, Estado: {$available}";
    }
}
