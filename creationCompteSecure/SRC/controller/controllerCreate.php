<?php
session_start();
include './config/connexion.php';
include './model/user.php';
include './manager/managerUser.php';
include './view/createuser.php';


//** VERIFICATION OF FIELDS IN THE FORM */
if(isset($_POST['name_user'])&&isset($_POST['surname_user'])&&
   isset($_POST['email_user'])&&($_POST['password_user'])&&isset($_POST['id_rights'])){
//** VERIFICATION OF PASSWORDS AND IF THEY MATCH */
    if($_POST['password_user']!=$_POST['confirmPassword']){
//** IF NOT SHOW ERROR PAGE*/ 
        header('Location: TryAgain');
//** IF THEY ARE GOOD INSTANCIATE AND STOCK OBJECT CLEANING THE INPUT TO AVOIND SQL INJECTION */
    }else{           
            $user = new Muser();    
            $user->setName(htmlspecialchars(strip_tags(trim($_POST['name_user']))));
            $user->setSurname(htmlspecialchars(strip_tags(trim($_POST['surname_user']))));
            $user->setEmail(htmlspecialchars(strip_tags(trim($_POST['email_user']))));
            $user->setPassword(htmlspecialchars(strip_tags(trim(password_hash($_POST['password_user'], PASSWORD_DEFAULT)))));
            $user->setIdRights(htmlspecialchars(strip_tags(trim($_POST['id_rights']))));
            $user->setStat(htmlspecialchars(strip_tags(trim($_POST['status_user']))));
            $user->setHash(htmlspecialchars(strip_tags(trim(md5($_POST['email_user'])))));
//** STOCK THE CONTENT OF THE OBJECT IN VARIABLES TO BIND THE PARAMS IN THE FUNCTION  */
            $nameUser = $user->getName();
            $mail= $user->getEmail(); 
            $nomfam = $user->getSurname();
            $mdp = $user->getPassword() ;
            $stat = $user->getStat();
            $rights = $user->getIdRights();
            $hlog = $user->getHash();
            $emailUser = $_POST['email_user'];
//**CHECK IF THE USER EMAIL ALREADY EXISTS TO AVOID DOUBLE DATA BEING STORED IN BDD */
            $ref=$user->userExist($bdd,$emailUser);
                if($ref&&isset($_POST['submit'])){
//** SET THE STATUS OF THE ACCOUNT TO ZERO MEANING ACESS IS DENIED UNTI EMAIL ADDRESS IS VERIFIED */
                    $attente = 0;
//** HASH THE EMAIL ADDRESS SO IT CAN BE USED IN THE URL TO IDENTIFY THE USER AT POINT OF VERIFICATION */
                    $hashLog = md5($_POST['email_user']);
//** POINT OBJECT TOWARDS THE FUNCTION CREATE TO STOCK THE BDD */
                    $user->createUser($bdd,$nameUser,$nomfam,$mail,$mdp,$rights,$stat, $attente, $hashLog);
//** SEND VERIFICATION EMAIL USING PHP MAILER AND OUTLOOK AS SMTP SERVER */
                    $userEmail = "katherinesneddon33@gmail.com";
                    $subject = "Welcome to the Party!!!!";
                    $emailMessage =  "Veuillez cliquer sur le lien pour activer votre compte<br><br>
                                    http://localhost/partytimeFilRouge/LoginToPartyWithTheBest?hash=$hashLog";
                    $user->sendMail($userEmail,$subject,$emailMessage);
//** SHOW PAGE REQUESTING USER VERIFIES EMAIL PRIOR TO ACCESSING THE SITE */
                    echo'<script>window.location.href="verifyEmail"</script>';
            }
            
//** IF USER ALREADY EXISTS SHOW ERROR PAGE WITH A TIMEOUT AND HREF FOR LOGIN PAGE */
            else{
                header('Location: AlreadyPartying!');
            }
          
       } 
   }


  
   











    

?>  