<?php
header ("Access-Control-Allow-Origin: *");
include '../config/connexion.php';
include '../model/have.php';
include '../manager/managerHave.php';
//** STOCK TYPE TO ALLOW FACTORISATION OF FUNCTION */
$type = 1;
//** VISIBILITY IN WHERE CLAUSE IF AT 0 REMAINS IN BDD BUT NOT VISIBLE ON THE SITE */
$vis = 1;
//** VARIABLES REFERRING TO PLACEMENTS ONE TWO AND THREE FOR THE LIST ORDER */
$onep = 1;
$twop = 2;
$threep = 3;

//** INSTANCIATION OF CLASS */
$shooter = new Mhave();
//** STOCK OBJECT WITH RETURN OF FUNCTION IN NEW VARIABLE */
$shot=$shooter->readHave($bdd,$type,$vis,$onep,$twop,$threep);
//** ENCODE DATA INTO JSON */
echo json_encode($shot);