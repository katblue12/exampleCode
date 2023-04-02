<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//** KEYWORD EXTENDS OPENS ACCESS THEN CLOSES AFTER USE
//** MANAGER IS USED TO SEPERATE THE FILES AND SENSITIVE CODE CONCERNING DATABASE INTERACTION AND STRUCTURE  */ */
class Muser extends user{
//* INSERT NEW USER INTO BDD USING BIND PARAMS AND PREPARE FOR SECURITY* */
public function createUser($bdd,$nameUser,$nomfam,$mail,$mdp,$rights,$stat,$attente, $hashLog){
//** TRY AND CATCH ALLOWS THE DATABASE TO BE CLOSED SHOULD AN ERROR OCCUR. THIS WILL CLOSE AND EVALUATE THE ERROR AFTERWARDS
//** AS AT THE POINT OF THE ERROR OCCURING IT IS UNKNOWN IF IT IS AN ATTACK */
    try{
//** THE FUNCTION PREPARE IS EMPLOYED TO SECURE THE REQUEST THIS IS ALSO FOR EFFICIENCY AS SQL WILL STOCK THE INFORMATION READY FOR PULLING AT THE NEXT REQUEST  */
        $req = $bdd->prepare("INSERT INTO user(name_user,surname_user,email_user,password_user,id_rights, status_user, emailLog_user)
        VALUES(?,?,?,?,?,?,?)");
//** BIND PARAMS HIDE THE INFORMATION BEING SENT AND PDO DECLARES THE TYPE OF INFORMATION THE BDD EXPECTS */
                $req->bindparam(1,$nameUser, PDO::PARAM_STR);
                $req->bindparam(2,$nomfam, PDO::PARAM_STR);
                $req->bindparam(3,$mail, PDO::PARAM_STR);
                $req->bindparam(4,$mdp, PDO::PARAM_STR);
                $req->bindparam(5,$rights, PDO::PARAM_INT);
                $req->bindparam(6,$attente, PDO::PARAM_INT);
                $req->bindparam(7,$hashLog, PDO::PARAM_STR);
                $req->execute();
                        }
    catch(exception $e){
        die('error:'.$e->getMessage());
    }
}

//** VERIFY CONTENT OF DATABASE TO SEE IF USER EXISTS AT POINT OF ACCOUNT CREATION RETURNS 
//*FALSE IF USER EXISTS ACCESSING RIGHTS VIA A FOREIGN KEY */
 public function userExist($bdd,$emailUser){
     try{ 
//** I HAVE USED STAR TO ALLOW ME TO EXPLAIN WHY IT SHOULDNT BE USED! THIS IS NOT OPTIMISED AS SQL WILL CARRY OUT TWO
//** REQUESTS. THE FIRST TO DETERMINE AND PULL WHAT THE * REPRESENTS THE SECOND WILL BE APPLIED TO THE RESULT OF THE FIRST
//** TO RETURN THE INFORMATION REQUESTED BY THE FUNCTION */
        $check = $bdd->prepare('SELECT * FROM user 
                                INNER JOIN rights ON rights.id_rights = user.id_rights 
                                WHERE email_user = ?');
      $check->bindparam(1,$emailUser, PDO::PARAM_STR);
      $check->execute();
      $result=$check->fetch();

        if($result){
            return false;
        } 
        else{
            return true;
        }
    }
    catch(exception $e){
        die('error:'.$e->getMessage());
    }
}
//** PULL CONTENT OF DATABASE INCLUDING USER STATUS TO STOCK THE SESSION AND VERIFY ACCESS */  
public function getUserByMail($bdd,$emailUser,$stat){
    try{
        $req = $bdd->prepare('SELECT id_user,name_user,surname_user,email_user,password_user,id_rights, status_user FROM user 
                            WHERE email_user = ? AND status_user=?');
        $req->bindparam(1, $emailUser, PDO::PARAM_STR);
        $req->bindparam(2, $stat, PDO::PARAM_INT);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;   
    }
    catch(Exception $e){
        die('error'.$e->getMessage());
    }
}

//**FUNCTION TO CHECK THE EMAIL ADDRESS AT POINT OF ACOCUNT VERIFICATION */
public function testLogin($bdd,$hashget){
    try{
        $check = $bdd->prepare("SELECT emailLog_user FROM user WHERE emailLog_user =?");
        $check->bindparam(1, $hashget, PDO::PARAM_STR);
        $check->execute();
        $testlog = $check->fetchAll(PDO::FETCH_OBJ);
        if($testlog){
            return true;
        }
        else{
            return false;
        }
    }
    catch(Exception $e){
        die('Error:'.$e->getMessage());
    }

}
//** UPDATE THE STATUS BOOLEAN OF A NEW USER TO VERIFIED /1 */
public function updateStatus($bdd,$hashLog,$attente,$wait){
    try{
        $st = $bdd->prepare('UPDATE user SET
                            status_user = ?;
                            WHERE emailLog_user = ? AND status_user = ?');
                $st->bindparam(1, $attente, PDO::PARAM_STR);
                $st->bindparam(2, $hashlog, PDO::PARAM_STR);
                $st->bindparam(3, $wait, PDO::PARAM_INT);
                $st->execute();
    }
    catch(Exception $e){
        die('Error:'.$e->getMessage());
    }
}  
//** ALLOW USER TO MODIFY ACCOUNT DETAILS  */
public function updateUser($bdd,$nameUser,$nomfam,$emailUser,$mdp,$rights){
    try{
    $change=$bdd->prepare('UPDATE user SET
                        name_user = ?,
                        surname-user = ?,
                        email_user = ?,
                        password_user = ?,
                        WHERE :id_user = ?');
       $change->bindparam(1,$nameUser, PDO::PARAM_STR);
       $change->bindparam(2,$nomfam, PDO::PARAM_STR);
       $change->bindparam(3,$emailUser, PDO::PARAM_STR);
       $change->bindparam(4,$mdp, PDO::PARAM_STR);
       $change->bindparam(5,$rights, PDO::PARAM_INT);
       $change->execute();
    }
    catch(Exception $e){
         die('error'.$e->getMessage());
    }
}

//** DELETES USER AND DESTROYS THE SESSION  */
public function deleteUser($bdd,$idUsers){

    try{
        $del = $bdd->prepare('DELETE FROM user WHERE id_user = ?');
        $del->bindparam(1, $idUsers, PDO::PARAM_INT);
        $del->execute();
        if($del){
            session_destroy();
            return true;
            
        }
        }

    catch(exception $e){
        die('error'.$e->getMessage());
        }
    }
//** SMTP SETTINGS PHP MAILER  */
public function sendMail($userEmail, $subject,$emailMessage){

require 'vendor/autoload.php';

    try{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;              
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp-mail.outlook.com';                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = '********';                     
    $mail->Password   = '********';                               
    $mail->SMTPSecure = 'tls';           
    $mail->Port       = 587;                                   
    $mail->setFrom('**********','partytime');
    $mail->addAddress($userEmail);                   
    $mail->isHTML(true);                                  
    $mail->Subject =$subject;
    $mail->Body    = $emailMessage;
    $mail->AltBody = 

    $mail->send();
    
    } 
    catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}


}
