<?php

//action.php
$userManager = new UserManager($PDO);
$messageManager = new messageManager($PDO);


if(isset($_GET["action"]) && $_GET["action"] === "listUsers")
{
    $userManager->listAll();
}

if(isset($_GET["action"]) && $_GET["action"] === "listMessages")
{
    $messageManager->listAll();

}

if(isset($_GET["action"]) && $_GET["action"] === "addMessage" && isset($_GET["userId"]) && isset($_GET["messageValue"]))
{
    http_response_code(201);
    echo'message envoyé';
    echo json_encode(true);
    $userId = $messageManager->add($_GET["messageValue"],$_GET["userId"]);
}

if(isset($_GET["action"]) && $_GET["action"] === "userAdd" && isset($_GET["userNickname"]))
{

    if($userManager->exist($_GET["userNickname"]))
    {
        //status code HTTP : sont des codes de réponse standard fournies par les serveurs de sites Web sur l'Internet. Les codes permettent d'identifier la cause du problème quand une page Web ou une autre ressource ne se chargent pas correctement. 
        //208 = deja reporté, donc existe déjà
        http_response_code(208);
        //echo'le contact existe deja';
        echo json_encode(false);
    }
    else
    {
        //201 = Créée car n'existe pas
        http_response_code(201);
        //echo'contact cree';

        $userId = $userManager->add($_GET["userNickname"]);
        echo json_encode($userId);
    }
}