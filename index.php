<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="./">Sollicitatie Applicatie</a>
    <a href="./?newApplication
" class="btn btn-success ml-auto">Nieuw Sollicitatie Toevoegen</a>
</nav>
<div class="container">
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/config.inc.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/models/Student.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/controllers/StudentController.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/models/ApplicationList.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/models/Application.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/controllers/ApplicationListController.php';

    session_start();
    // Checks if student is signed in
    if (!isset($_SESSION['student']))
    {
        // Send then to login page
        $studentController = new StudentController();
        $studentController->getLogin();
        exit();
    } else
    {
        $student = unserialize($_SESSION['student']);
        $studentController = new StudentController($student);
    }


    $applicationController = new ApplicationListController($student->getId());
    /*Checks if $id is in URL if true get single application
    else show all applications
    */
    if (isset($_GET['id']) && !empty($_GET['id']))
    {
        $applicationController->getApplication($_GET['id']);
    } else if (isset($_GET['newApplication']))
    {
        $applicationController->newApplication();
    } else
    {
        $applicationController->showAll();
    }


    ?>
</div>
</body>
</html>
