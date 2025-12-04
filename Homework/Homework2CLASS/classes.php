<?php

class User {
    public $fullName;
    protected $passportNumber;
    protected $phone;
    public $age;

    public function __construct($fullName, $passportNumber, $phone, $age) {
        $this->fullName = $fullName;
        $this->passportNumber = $passportNumber;
        $this->phone = $phone;
        $this->age = $age;
    }

    public function getPassport() {
        return $this->passportNumber;
    }

    public function getPhone() {
        return $this->phone;
    }
}

class Student extends User {
    public $gpa;
    public $faculty;
    public $course;

    public function __construct($fullName, $passportNumber, $phone, $age, $gpa, $faculty, $course) {
        parent::__construct($fullName, $passportNumber, $phone, $age);
        $this->gpa = $gpa;
        $this->faculty = $faculty;
        $this->course = $course;
    }
}

?>
