<?php
include './header/header.php';
$messageOne="";
$message="";

 // login password incorrect 
    if($_GET['page']=="whoops!"){
        $messageOne = "Houston we have a problem!";
        $message = "Whoops tu n'avais pas saisi le bon mot de passe, tenter encore!";
    }
    // create account passwords dont match 
    else if($_GET['page']=="TryAgain"){
        $messageOne = "Houston we have a problem!";
        $message = "Ooops! Des mots de passes ne sont pas le meme, tenter encore!";
     }
    // Create account email address already in system go to login 
    else if($_GET['page']=="AlreadyPartying!"){
        $messageOne = "Houston we have a problem!";
        $message = "T'es déjà parmi nous!Connectes-toi to party!!";
    }
    // account created
    else if($_GET['page']=="verifyEmail"){
        $messageOne = "Tu seras bientot parmi nous!";
        $message = "Pour ton sucurité, verifier votre email et cliques sur le lien dans celui!";
     }
    else if($_GET['page']=="NotPartying"){
        $messageOne = "Houston we have a problem!";
        $message = "Whoopsi tu n'es pas encore sur le guest list! Inscrit toi to party!!!!";
    }
    else if($_GET['page']=="TuEsPartiTôt!"){
        $messageOne = "Tu vas déjà partir?? ";
        $message = "A la prochaine!!!";
    }
    else if($_GET['page']=="Login"|$_GET['page']=="login"){
        $messageOne = "Dommage! Pas de chance la développeuse n'est pas autant stupide que ça!";
                   
        $message = " Elle peut te bloquer aussi! Off you pop!";
    }
    else if($_GET['page']=="Admin"|$_GET['page']=="admin"){
        $messageOne = "Ah on a un joueur! Non tu ne peux pas modifier mon url, je suis un cyberdev!";
        $message = "Off you pop!";
    }
    else if($_GET['page']=="Verified"){
        $messageOne = "T'es verifié!!!!";
        $message = "pour securité connectes-toi, le page connexion arrive";
    }
?>
<header>
</header>
<body>
    <section>
    <p><?=$messageOne?></p>
    <p><?=$message?></p>
    <p>This page will self destruct</p>
    <p id="ready">Pret? </p>
    <p id="counter" load="Return()">6</p>
    </section>
</body>
</html>

