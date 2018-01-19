<?php
session_start();
require('./includes/init.php');
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
<?php
$req = $db->query("SELECT * FROM item ORDER BY date desc");
$items = $req->fetchAll();
foreach ($items as $item) {
    $seller = $item['id_seller'];
    $req = $db->query("SELECT * FROM user WHERE id_user = $seller");
    $user = $req->fetch();
    ?>
    <div class="item">
        <img src="<?php echo $item['photo'] ?>" alt="" width="200px">
        <h3><?php echo $item['name'] ?></h3>
        <h4><?php echo $item['category'] ?></h4>
        <p><?php echo $item['price'] ?>€</p>
    </div>
    <?php
}
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>