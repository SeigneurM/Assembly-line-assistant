<!DOCTYPE html>
<html>
<head>
<title>ECAM Factory </title>

<link rel="stylesheet" href="style.css" />

</head>

<?php
// on se connecte à notre base
$base = mysqli_connect ('127.0.0.1', 'root', '', 'labsession4_seigneur');
?>
<html>
<body>
<?php
$Id=$_GET["Id"];
$Status=$_GET["Status"];
// lancement de la requête
$sql ="UPDATE ordertable SET Status= '" .$Status."' WHERE Id= '".$Id."'";

// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
mysqli_query($base, $sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($base));

// on ferme la connexion à la base
mysqli_close($base);
?>
<img alt="ECAM" align="right" width="284" height="142" src="Logo_ECAM_2015.jpg"   />
<h1> The order has been updated</h1> 

<form method="post" action="Show_waiting_orders.php">
<input class="favorite styled" type="submit" value="Go back to waiting orders" />
</form>

</body>
</html>
