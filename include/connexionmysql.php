<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=photo4u;charset=utf8','adminfoto','AZERTY11');
}
catch (Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>

