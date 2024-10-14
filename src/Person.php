<?php

declare(strict_types=1);

namespace Practica\Test;


class Person
{

    public $name;
    public $lasName;

    private $dni;

    private $age;


    public function __construct(string $name, string $lasName, int $dni, int $age)
    {

        $this->name = $name;
        $this->lasName = $lasName;
        $this->dni = $dni;
        $this->age= $age;
    }


    public function isOfLegalAge()
    {

        if($this->age >= 18) {
            return "Es mayor de edad";
        }
        return "Es menor de edad";




       /* $nc = new \DateTime($this->dateOfBirth);
        $day = new \DateTime();
        $age = $day->diff($nc)->y;
        return $age >= 18;*/
    }

    public function initials()
    {
        return strtoupper($this->name[0]  . $this->lasName[0] );
    }


    public function rename($newName, $newLastName)
    {
        $this->name = $newName;
        $this->lasName = $newLastName;
    }



}



/*$person = new Person("Marcos", "Marin", 3045242, 18 );
echo $person->isOfLegalAge();
echo $person->initials();
$person->rename('Pedro', 'Perez');*/
