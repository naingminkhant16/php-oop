<?php
class Person
{
    public $name, $age, $gender, $proNoun, $possProNoun, $birthYear;
    function __construct($name, $age, $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->proNoun = $gender === 'male' ? 'He' : "She";
        $this->possProNoun = $gender === 'male' ? 'His' : "Her";
        $this->birthYear = date('Y') - $age;
    }
    public function intro()
    {
        return $this->proNoun . " is $this->name and $this->possProNoun age is $this->age years old who born in" . $this->birthYear;
    }
}
