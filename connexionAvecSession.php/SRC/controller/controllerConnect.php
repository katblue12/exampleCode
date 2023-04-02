<?php
session_start();
include './config/connexion.php';
include './model/user.php';
include './manager/managerUser.php';
include './view/login.php';


//** TEST TO SEE IF FIELDS EXIST AND BUTTON HAS BEEN CLICKED */
if(isset($_POST['submit'])){
    if(isset($_POST['email_user'])&& isset($_POST['password_user'])){
        $emailUser = ($_POST['email_user']);
        $passwordLog = ($_POST['password_user']);
//* INSTINCIATION OF OBJECT */
        $user = new Muser();

//* STOCK OBJECT WITH USER INFORMATION CLEANED TO AVOID SQL INJECTION */
        $user->setEmail(htmlspecialchars(strip_tags(trim($emailUser))));
        $user->setPassword(htmlspecialchars(strip_tags(trim($passwordLog))));
//* CONFIRM VERIFIED STATUS OF ACCOUNT 1 = VERIFIED*/
        $stat = 1;  
//*FUNCTION TO CHECK IF USER EXISTS IN BDD AND USE THE RETURN TO VERIFY CREDENTIALS* */
        $userLog = $user->getUserByMail($bdd,$emailUser,$stat);
      
        
        $ex = $user->userExist($bdd,$emailUser);
        if($ex!=NULL){
            header('Location: NotPartying');
        }
//**IF RETURN IS DIFFERENT TO NULL VERIFY HASHED PASSWORD AND CREATE THE SESSION */      
        else if($userLog!=NULL){
            if(password_verify($passwordLog, $userLog[0]['password_user'])){
                 
                $_SESSION['id'] = $userLog[0]['id_user'];
                $_SESSION['name'] = $userLog[0]['name_user'];
                $_SESSION['surname'] = $userLog[0]['surname_user'];
                $_SESSION['email'] = $userLog[0]['email_user'];
                $_SESSION['rights'] = $userLog[0]['id_rights'];
                $_SESSION['msg'] = "";
                $_SESSION['connected'] = true;}
                else{
                    header('Location: whoops!');
                    }
//** IF RIGHTS = 1 USER IS STANDARD */                
            if($_SESSION['rights']==1){
                header('Location: ChoisirShooter');
                }
//** IF RIGHTS = 2 USER IS ADMIN -- EXTENDED URL TO AVOID INPUT OF 'ADMIN' IN URL */
            else if($_SESSION['rights']==2){
                header('Location: 685732145AdMinAreABossInDaHouse!');
                }

            }
        }
     
}



        
    



?>