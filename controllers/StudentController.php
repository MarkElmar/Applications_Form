<?php


class StudentController
{
    private $studentModel;

    public function __construct($model = null)
    {
        if ($model != null)
        {
            $this->studentModel = $model;
        }
    }

    public function getLogin()
    {
        include "./views/login.php";
        exit();
    }

    public function checkUser($studentNumber, $password)
    {
        global $dbs;

        $safe_studentNumber = htmlentities(filter_var($studentNumber, FILTER_SANITIZE_STRING));

        $stmt = $dbs->prepare("SELECT * FROM students WHERE studentNumber = :stdnt");

        $stmt->bindValue(':stdnt', $safe_studentNumber);

        $stmt->execute();

        if ($stmt->rowCount() != 1)
        {
            header("Location: /?noStudentFound");
            exit;
        }

        $row = $stmt->fetch();

        if (password_verify($password, $row['password']))
        {
            $student = new Student($row['givenName'], $row['familyName'], $row['fullName'], $studentNumber, $row['id']);
            $_SESSION['student'] = serialize($student);

            header("Location: ./");
        }

    }
}