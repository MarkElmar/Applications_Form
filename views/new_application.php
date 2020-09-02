<title>Nieuwe Sollicitatie</title>
<?php
if (isset($_POST['submit']))
{
    $app = new Application($_POST['company'],
        $_POST['contact'],
        $_POST['date'],
        $_POST['way'],
        $_POST['dateConfirmation'],
        $_POST['firstMeeting'],
        $_POST['secondMeeting'],
        $_POST['rejectionReason'],
        $_POST['accepted']
    );

    $app->newApp();

}

?>
<!-- Form For New Applications-->
<form method="post" action="">
    <div class="form-group">
        <label for='company'>Bedrijfsnaam: </label>
        <input type='text' name="company" class="form-control" id='company' required>
    </div>
    <div class="form-group">
        <label for='contact'>Contact Persoon Bedrijf: </label>
        <input type='text' name="contact" class="form-control" id='contact' required>
    </div>
    <div class="form-group">
        <label for="date">Datum Sollicitatie: </label>
        <input type='date' name="date" class="form-control" id='date' required>
    </div>
    <div class="form-group">
        <label for="way">Sollicitatie Manier: </label>
        <select id='way' name="way" class="form-control" required>
            <option value='email'>E-mail</option>
            <option value='phone'>Telefoon</option>
            <option value='personal'>Persoonlijk</option>
        </select>
    </div>
    <div class="form-group">
        <label for="dateConfirmation">Datum Verificatie Ontvangst</label>
        <input type='date' name="dateConfirmation" class="form-control input-l" id='dateConfirmation'>
    </div>
    <div class="form-group">
        <label for="firstMeeting">Datum Eerste Sollicitatie Gesprek</label>
        <input type='date' name="firstMeeting" class="form-control" id='firstMeeting'>
    </div>
    <div class="form-group">
        <label for="secondMeeting">Datum Tweede Sollicitatie Gesprek</label>
        <input type='date' name="secondMeeting" class="form-control" id='secondMeeting'>
    </div>
    <div class="form-group">
        <label for="rejectionReason">Reden Afwijzing</label>
        <textarea id='rejectionReason' name="rejectionReason" class="form-control"></textarea>
    </div>
    <label for="accepted"> Aangenomen?</label>
    <div class="input-group">
        <input type='radio' value="true" name="accepted" class="form-check " id='accepted_true' required>&nbsp;Ja
        <input type='radio' value="false" name="accepted" class="form-check ml-3" id='accepted_false' required>&nbsp;Nee
    </div>
    <div class="btn-group mt-2">
        <a href="/" class="btn btn-danger">Terug</a>
        <input id="submit" type="submit" name="submit" value="Opslaan" class="btn btn-info">
    </div>
</form>