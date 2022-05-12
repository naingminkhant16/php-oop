<?php
class Student extends Person
{
    public $attendedClass, $schoolHour, $studyHour;
    function __construct($name, $age, $gender, $attendedClass, $schoolHour, $studyHour)
    {
        parent::__construct($name, $age, $gender);
        $this->attendedClass = $attendedClass;
        $this->schoolHour = $schoolHour;
        $this->studyHour = $studyHour;
    }
}
