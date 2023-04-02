<?php
include './header/header.php';
include './view/menu.php';
?>

<body>
    <section>
        <form action="" method="POST">
            
        <label for="email_user">Email</label>
        <input class="username" type="email" name="email_user">
        
        <label for="password_user">Votre mot de passe</label>
        <input class="viewPass" class="hidePass" type="password" name="password_user">
        
       
    <div>
        <button type="submit" name="submit">Se connecter</button>
        <button type="button" id="remfor" class="remember" class="forget">Me souvenir</button>
        <button type="button" class="view" class="hide">Voir le mot de passe</button>
    </div>
</form>
    </section>
</body>
</html>