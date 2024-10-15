<?php


declare(strict_types=1);

namespace Practica\Test;

use PHPUnit\Framework\TestCase;


final class ReaderTest extends TestCase
{



    public function testReader()
    {

        $reader = new Reader('Daniel');

        $this->assertEquals("Daniel", $reader->nameReader());
        $this->assertEmpty($reader->borrowedBooks());
    }
    /**
     * @test
     */

    public function testBorrow()
    {

        $book = new Book("estamos solos?", "cipriano", "id");
        $reader = new Reader('Daniel');


        $reader->borrow($book);
        $this->assertFalse($book->isAvailable());
        $this->assertCount(1, $reader->borrowedBooks());
    }
    /**
     * @test

     */
    public function TestReturnBook()
    {


        $book = new Book("estamos solos?", "cipriano", "id");
        $reader = new Reader('Daniel');

        //$reader->borrow($book);
        $reader->returnBook($book);

        $this->assertTrue($book->isAvailable());
        $this->assertCount(0, $reader->borrowedBooks());
    }

/**
     * @test
     */

     public function TestShowBook(){

        $book1 = new Book("estamos ?", "cipri", "id");
        $book2 = new Book("No estamos solos", "cipriano", "id");
        $reader = new Reader('Daniel');
        

        $reader->borrow($book1);
        $reader->borrow($book2);

        $result = "Los libros prestados por   Daniel:\n" .
                   $book1->showInfo() ."\n" .
                   $book2->showInfo() . "\n";

        $this->assertEquals($result , $reader->showBorrowedBooks());

     }
 }

