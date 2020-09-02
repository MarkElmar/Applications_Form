<?php

try
{
    $dbs = new PDO(
        'mysql:host=localhost;dbname=83220_database;charset=utf8',
        '83220_database',
        '#1Geheim!'
    );

    $dbs->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $dbs->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch (PDOException $PDOe)
{
    print $PDOe->getMessage();
}