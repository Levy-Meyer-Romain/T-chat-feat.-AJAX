<?php

//juste pour yvan ne pas en tenir compte
header('Content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
//connexion
require_once "dbconnect.php";

// Chargement des classes
require_once "model/user_manager_class.php";
require_once "model/message_manager_class.php";

// Gestion des actions
require_once "controller/actions.php";