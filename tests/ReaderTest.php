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
        $reader = new Reader('Daniel', $test, []);

        $this->assertEquals("Daniel", $reader->nameReader());
        $this->assertEmpty($reader->borrowedBooks());
    }
    /**
     * @test
     */

    public function testBorrow()
    {
        $test =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test, true);
        $reader = new Reader('Daniel', $test,[]);


        $reader->borrow($book);
        $this->assertFalse($book->isAvailable());
        $array = [$book];
        $this->assertSame($array, $reader->borrowedBooks());
    }
    /**
     * @test

     */
    public function TestReturnBook()
    {

        $test =  Uuid::uuid4()->toString();
        $reader = new Reader('Daniel', $test,[]);
        $test2 =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $test2, true);
        $test3 =  Uuid::uuid4()->toString();
        $book = new Book("Harry Potter", "Marcos", $test3, false);


        $reader->borrow($book);
        $this->assertEquals(false,$book->isAvailable());
        $reader->returnBook($book);
        $this->assertEquals(false,$book->isAvailable());
        
    }
 
    /**
     * @test
     */

    public function TestShowBook()
    {
        $test =  Uuid::uuid4()->toString();
        $book1 = new Book("estamos solos?", "cipriano", $test, true);
        $test2 =  Uuid::uuid4()->toString();
        $book2 = new Book("No estamos solos", "cipriano", $test2, true);
        $test3 =  Uuid::uuid4()->toString();
        $reader = new Reader('Daniel', $test3,[]);


        $reader->borrow($book1);
        $reader->borrow($book2);

        $result = "Los libros prestados por Daniel:\n" .
            $book1->showInfo() . "\n" .
            $book2->showInfo() . "\n";



        $this->assertEquals($result, $reader->showBorrowedBooks());
    }
}
