<!DOCTYPE html>
<html>
<head>
<title>ECAM Factory </title>

<link rel="stylesheet" href="style.css" />

<img alt="ECAM" align="right" width="284" height="142" src="Logo_ECAM_2015.jpg"   />
<h1>The quality table has been updated</h1> 

</head>


<?php
// on se connecte à notre base
$base = mysqli_connect ('127.0.0.1', 'root', '', 'labsession4_seigneur');
?>
<html>
<body>
<?php
$order_id=$_GET["order_id"];
$product_type=$_GET["product_type"];
$product_id=$_GET["product_id"];
$state=$_GET["state"];
$flaw_id=$_GET["flaw_id"];
// lancement de la requête
$sql ="INSERT into `quality_test` (`order_id`, `product_type`, `product_id`, `state`, `flaw_id`) VALUES ('".$order_id."','".$product_type."','".$product_id."','".$state."','".$flaw_id."')";

// on exécute la requête (mysql_query) et on affiche un message au cas où la requête ne se passait pas bien (or die)
mysqli_query($base, $sql) or die('Erreur SQL !'.$sql.'<br />'.mysqli_error($base));

// on ferme la connexion à la base
mysqli_close($base);
?>


<body>
<form method="post" action="Quality.php">
<input class="favorite styled" type="submit" value="Go back to quality page" />
</form>
<form method="post" action="Homepage.php">
<input class="favorite styled" type="submit" value="Go back to homepage" />
</form>

</body>
</html>