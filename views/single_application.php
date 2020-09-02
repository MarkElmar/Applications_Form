<title>Solicitatie bij <?= $application[0]->company ?></title>
<?php
$application = $application[0];

// Sends date to class to save
if (isset($_POST['submit']))
{
    $application->save($_POST['company'],
        $_POST['contact'],
        $_POST['date'],
        $_POST['way'],
        $_POST['dateConfirmation'],
        $_POST['firstMeeting'],
        $_POST['secondMeeting'],
        $_POST['rejectionReason'],
        $_POST['accepted']
    );

}
?>
<!--Form To Update And See Application-->
<form method="post" action="">
    <label for='company'>Bedrijfsnaam: </label>
    <input type='text' name="company" class="form-control input-l" id='company' value='<?= $application->company ?>'
           disabled required>
    <label for='contact'>Contact Persoon Bedrijf: </label>
    <input type='text' name="contact" class="form-control input-l" id='contact' value='<?= $application->contact ?>'
           disabled required>
    <label for="date">Datum Sollicitatie: </label>
    <input type='date' name="date" class="form-control input-l" id='date' value='<?= $application->date ?>' disabled
           required>
    <label for="way">Sollicitatie Manier: </label>
    <select id='way' name="way" class="form-control input-l" disabled required>
        <option value='email' <?= ($application->way == 'email') ? "selected" : "" ?>>E-mail</option>
        <option value='phone' <?= ($application->way == 'phone') ? "selected" : "" ?>>Telefoon</option>
        <option value='personal' <?= ($application->way == 'personal') ? "selected" : "" ?>>Persoonlijk</option>
    </select>
    <label for="dateConfirmation">Datum Verificatie Ontvangst</label>
    <input type='date' name="dateConfirmation" class="form-control input-l" id='dateConfirmation'
           value='<?= $application->dateConfirmation ?>' disabled>
    <label for="firstMeeting">Datum Eerste Sollicitatie Gesprek</label>
    <input type='date' name="firstMeeting" class="form-control input-l" id='firstMeeting'
           value='<?= $application->firstMeeting ?>' disabled>
    <label for="secondMeeting">Datum Tweede Sollicitatie Gesprek</label>
    <input type='date' name="secondMeeting" class="form-control input-l" id='secondMeeting'
           value='<?= $application->secondMeeting ?>' disabled>
    <label for="rejectionReason">Reden Afwijzing</label>
    <textarea id='rejectionReason' name="rejectionReason" class="form-control input-l"
              disabled><?= $application->rejectionReason ?></textarea>
    <label for="accepted"> Aangenomen?</label>
    <div class="input-group">
        <input type='radio' value="true" name="accepted" class="form-check input-l"
               id='accepted_true' <?= ($application->accepted == 1) ? "checked" : "" ?> disabled>&nbsp;Ja
        <input type='radio' value="false" name="accepted" class="form-check ml-3 input-l"
               id='accepted_false' <?= ($application->accepted == 0) ? "checked" : "" ?> disabled>&nbsp;Nee
    </div>
    <div class="btn-group mt-2">
        <a href="/" class="btn btn-danger">Terug</a>
        <a id="editButton" class="btn btn-dark">Wijzigen</a>
        <input id="submit" type="submit" name="submit" value="Opslaan" class="btn btn-info toast hide">
    </div>
</form>
<script src="/js/single_application.js"></script>