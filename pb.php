<?php
$host = 'localhost';
$dbname = 'racunalniske_storitve';
$user = 'root';
$password ='';
try{
    $povezava = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$password);
    $povezava -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    die("Povezava ni uspela. Glej napako:". $e->getMessage());
}
?>