<?php
session_start();
include './config/connexion.php';
include './model/user.php';
include './manager/managerUser.php';
//** USE SUPERGLOBAL TO DETECT URL PATHNAME  */
$url = $_SERVER['REQUEST_URI'];
//** USE EXPLODE FUNCTION TO OBTAIN URL CONTENT AFTER THE =  */
$url = explode("=", filter_var($url), FILTER_SANITIZE_URL);
//** IF URL CONTENT EXISTS AND IS DIFFERENT TO EMPTY STOCK HASHED USER EMAIL ADDRESS IN VARIABLE TO USE FOR VERIFICATION */
if(isset($url[1])&&$url[1]!="" ){
    $hashLog = $url[1];
//** STOCK VARIABLE TO UPDATE STATUS TO 1/TRUE--- ACOUNT ACTIVATED  */
    $attente = 1;
//** 0/FALSE IS THE CURRENT STATE OF THE STATUS USER IN THE WHERE CLAUSE THIS IS FOR THE BIND PARAM  */
    $wait = 0;
//** INSTANCIATION OF THE CLASS */
    $userCheck = new Muser();
//** CHECK THE HASHED EMAIL ADDRESS EXISTS USING THE VARIABLE STOCKED WITH THE RECUPERATED URL CONTENT */
    $checkSt = $userCheck->testLogin($bdd, $hashLog);
    if($checkSt==TRUE){
//** IF IT EXISTS UPDATE THE STATUS TO 1 ALLOWING LOGIN IN ACCORDANCE WITH THE CONDITION IN THE LOGIN FUNCTION */
        $userCheck->updateStatus($bdd, $hashLog, $attente,$wait);
        header('Location:Verified');
    }
    else{
        echo 'Not verified';
    }
}
