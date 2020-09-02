<?php


class Student
{
    public $givenName;
    public $familyName;
    public $fullName;
    public $studentNumber;
    private $id;

    public function __construct($givenName, $familyName, $fullName, $studentNumber, $id)
    {
        $this->givenName = $givenName;
        $this->familyName = $familyName;
        $this->fullName = $fullName;
        $this->studentNumber = $studentNumber;
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}