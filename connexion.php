<?php

session_start();
include("includes/init.php");

?>
    <!DOCTYPE HTML>
    <html>
    <head>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
        <title>Accueil TechArea</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link id="style" rel="stylesheet" href="css/main.css" />

    </head>

    <body>
    <div class="mainmenu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="formulaire_produit.php">Ajouter un produit</a></li>
            <li><a href="membre.php">Mon compte</a></li>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="Connexion">Connexion</a></li>
        </ul>
    </div>

<form action="" method="post">
    <input type="text" name="username" id="username" placeholder="username">
    <input type="password" name="password" id="password" placeholder="password">
    <input type="submit" value="Valider">

</form>


<?php

if ((isset($_POST)) && (!empty($_POST['username'])) && (!empty($_POST['password']))) {
    $password = crypt($_POST['password'], '$2a$07$azds8dfbn2sdseferd54gfhjkelqa$');
    $request = $db->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
    $request->execute([
        ':username' => htmlentities($_POST['username']),
        ':password' => htmlentities($password)
    ]);
    $result = $request->fetchAll();

    if(count($result) > 0){
        $_SESSION["id"] = $result[0]["id_user"];
        //header location vers accueil ou page membre
        echo "connecté";
    }
    else {
        echo "connexion impossible, veuillez réessayer";
    }
}
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>
