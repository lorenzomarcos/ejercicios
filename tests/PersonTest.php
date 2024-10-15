<?php

declare(strict_types=1);


use PHPUnit\Framework\TestCase;
use Practica\Test\Person;



class PersonTest extends TestCase
{


    public function testIsOfLegalAge()
    {
        $adult = new Person("Marcos", "Marin", 32505486, 14);

        $resultado = $adult->isOfLegalAge();


        $this->assertEquals("Es menor de edad", $resultado);
    }


    public function testInitials()
    {
        $person = new Person("Marcos", "Marin", 32505486, 18);
        $this->assertEquals("MM", $person->initials());

        $person = new Person("Jose", "Perez", 32505486, 18);
        $this->assertEquals("JP", $person->initials());
    }


    public function testRename()
    {
        $person = new Person("Marcos", "Marin", 30502945, 18);
        $person->rename("Juan", "Jose");

        $this->assertEquals("Juan", $person->name);
        $this->assertEquals("Jose", $person->lasName);
    }
}
