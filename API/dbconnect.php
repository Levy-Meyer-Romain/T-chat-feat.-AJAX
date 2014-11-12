<?php

try
{
    $PDO=new PDO("mysql:host=localhost;dbname=tchat;charsetUTF8","3wa","troiswa");
}
catch(PDOException $exceptionObject)
{
    echo'erreur de connection (' . $exceptionObject->getCode() . '): ' . $exceptionObject->getMessage();
    exit();
}