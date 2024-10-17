<?php

declare(strict_types=1);

namespace Practica\Test;

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;




final class BookTest extends TestCase
{


    public function testCreationBook()
    {


        $book = new Book("estamos solos?", "cipriano", Uuid::uuid4()->toString(), true);

        $this->assertEquals("estamos solos?", $book->titleBook());
        $this->assertEquals("cipriano", $book->authorBook());
        $this->assertTrue($book->isAvailable());
    }
    /**
     * @test
     */
    public function testShowInfo()
    {
        $test =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test, true);
        
        $showinfo = "Titulo: estamos solos? , Autor: cipriano , ID: ". $test .", Estado: disponible";
        

        $this->assertEquals($showinfo, $book->showInfo());
    }

    /**
     * @test
     */

    public function lend()
    {
        $test =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test,true);

        $book->lend();
        $this->assertFalse($book->isAvailable());
    }

    /**
     * @test
     */

    public function return()
    {
        $test =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test, true);

       $book->lend();
       $this->assertFalse($book->isAvailable());

        $book->return();
        $this->assertTrue($book->isAvailable());
    }

    public function book (){

        $test =  Uuid::uuid4()->toString();
        $book = new Book ("estamos solos?", "cipriano", $test, false);

        $book->return();

        $this->assertTrue($book->isAvailable());
    }
}
