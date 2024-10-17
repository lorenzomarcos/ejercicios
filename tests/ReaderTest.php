<?php


declare(strict_types=1);

namespace Practica\Test;

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;


final class ReaderTest extends TestCase
{



    public function testReader()
    {
        $test =  Uuid::uuid4()->toString();
        $reader = new Reader('Daniel',$test);

        $this->assertEquals("Daniel", $reader->nameReader());
        $this->assertEmpty($reader->borrowedBooks());
    }
    /**
     * @test
     */

    public function testBorrow()
    {
        $test =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test,true);
        $reader = new Reader('Daniel',$test);


        $reader->borrow($book);
        $this->assertFalse($book->isAvailable());
        $this->assertCount(1, $reader->borrowedBooks());
    }
    /**
     * @test

     */
    public function TestReturnBook()
    {

        $test =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test,true);
        $reader = new Reader('Daniel', $test);

        $reader->borrow($book);
        $reader->returnBook($book);

        $this->assertTrue($book->isAvailable());
        $this->assertCount(0, $reader->borrowedBooks());
    }

    /**
     * @test
     */

    public function TestShowBook()
    {
        $test =  Uuid::uuid4()->toString();
        $book1 = new Book("estamos solos?","cipriano",$test,true);
        $test =  Uuid::uuid4()->toString();
        $book2 = new Book("No estamos solos","cipriano",$test,true);
        $reader = new Reader('Daniel',$test);


        $reader->borrow($book1);
        $reader->borrow($book2);

        $result = "Los libros prestados por Daniel:\n" .
            $book1->showInfo() . "\n" .
            $book2->showInfo() . "\n";
            
            

        $this->assertEquals($result, $reader->showBorrowedBooks());
    }
}
