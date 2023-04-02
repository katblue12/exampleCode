<?php

include './header/header.php';
include './view/menu.php';
?>
<body>
<?php
if (isset($_SESSION['connected'])&&$_SESSION['rights']==2){
?>
<div>
<p>Salut <?=$_SESSION['name']?>! T'es sur la page des shooters! </p>
</div>
<?php
}
else if(isset($_SESSION['connected'])&& $_SESSION['rights']==1){
?>
<div>
<p>Salut <?=$_SESSION['name']?>! T'es sur la page des shooters! </p>
</div>
<div id="breadcrumb">
<p>Ajoute des shooters à ton planner pour ta fête et garde-les pour plus tard!</p>
<p>Et n'oublie pas, aies toujours un adulte responsable à proximité lorsque tu mets le feu à de l'alcool!</p>
</div>
<?php
}
else{
?>
<div><p>Tu n'es pas encore au PARTY! Connectes-toi pour organiser ta fête! Come join us!</p></div>
<?php
}
?>



<section id="show_shot">
</section>


</body>
</html>