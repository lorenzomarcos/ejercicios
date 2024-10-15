<?php

declare(strict_types=1);

namespace Practica\Test;

use PHPUnit\Framework\TestCase;



final class BookTest extends TestCase
{


    public function testCreationBook()
    {


        $book = new Book("estamos solos?", "cipriano", "");

        $this->assertEquals("estamos solos?", $book->titleBook());
        $this->assertEquals("cipriano", $book->authorBook());
        $this->assertTrue($book->isAvailable());
    }
    /**
     * @test
     */
    public function testShowInfo()
    {

        $book = new Book("estamos solos?", "cipriano", "id");

        $showinfo = "Titulo: estamos solos? , Autor: cipriano , ID: {$book->idBook()}, Estado: disponible";
        $this->assertSame($showinfo, $book->showInfo());
    }

    /**
     * @test
     */

    public function lend()
    {

        $book = new Book("estamos solos?", "cipriano", "id");

        $book->lend();
        $this->assertFalse($book->isAvailable());
    }

    /**
     * @test
     */

    public function return()
    {

        $book = new Book("estamos solos?", "cipriano", "id");

        //$book->lend();
       // $this->assertFalse($book->isAvailable());

        $book->return();
        $this->assertTrue($book->isAvailable());
    }

    public function book (){

        $book = new Book ("estamos solos?", "cipriano", "id");

        $book->return();

        $this->assertTrue($book->isAvailable());
    }
}
