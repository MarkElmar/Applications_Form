<?php
if (isset($_POST['submit']))
{
    global $studentController;
    $studentController->checkUser($_POST['studentNumber'], $_POST['password']);
    die();
}
if (isset($_GET['studentNotFound']))
{
    echo "<p class='text-center text-danger'>Studenten is niet gevonden</p>";
}
?>
<form method="post" action="" class="text-center mt-5">
    <label for="studentNumber">Studenten Nummer: </label><br/>
    <input type="text" class="form-control w-50 m-auto" name="studentNumber" id="studentNumber" placeholder="123456"
           required><br/>
    <label for="password">Wachtwoord: </label><br/>
    <input type="password" class="form-control w-50 m-auto" name="password" id="password" required><br/>
    <input type="submit" class="btn btn-dark" name="submit" value="Log In">
</form>
