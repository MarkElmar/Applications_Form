<title>Solicitatie Overzicht</title>
<table class="table-dark table table-responsive-md">
    <tr>
        <th>Bedrijfsnaam:</th>
        <th>Contact Persoon:</th>
        <th>Sollicitatie Datum:</th>
        <th>Sollicitatie Manier:</th>
        <th>Aangenomen</th>
        <th>&nbsp;</th>
    </tr>
<?php
foreach ($all_applications as $application)
{
    $application = $application[0];

    echo "<tr>";
    echo "<td>" . $application->company . "</td>";
    echo "<td>" . $application->contact . "</td>";
    echo "<td>" . $application->date . "</td>";
    switch ($application->way)
    {
        case 'email':
            $way = "E-mail";
            break;
        case 'phone':
            $way = "Telefonisch";
            break;
        case 'personal':
            $way = "Persoonlijk";
            break;
        default:
            $way = "Error";
    }
    echo "<td>" . $way . "</td>";
    if ($application->accepted == 1)
    {
        $accepted = "Ja";
    } else
    {
        $accepted = "Nee";
    }

    echo "<td>" . $accepted . "</td>";
    echo "<td><a href='./?id=" . $application->getId() . "'>Details</a></td>";
    echo "</tr>";
}