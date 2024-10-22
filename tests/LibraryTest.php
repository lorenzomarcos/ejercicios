<?php

declare(strict_types=1);

namespace Practica\Test;

use Ramsey\Uuid\Uuid;
use PHPUnit\Framework\TestCase;


class LibraryTest extends TestCase
{


    public function testAddBookReader()
    {

        $id =  Uuid::uuid4()->toString();
        $library = new Library($id, "Gran central", [], []);

        $idBook =  Uuid::uuid4()->toString();
        $book = new Book("estamos solos?", "cipriano", $idBook, true);
        
        
        $library->addBook($book);

        $result = $library->borrowLibrary($book);
        $this->assertEquals(true,$result);
    }
}
