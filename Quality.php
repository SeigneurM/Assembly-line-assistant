<!DOCTYPE html>
<html>
<head>
<title>Quality </title>

<link rel="stylesheet" href="style.css" />

<img alt="ECAM" align="right" valign="top" width="284" height="142" src="Logo_ECAM_2015.jpg"   />
<img alt="ECAM FACTORY" align="center" src="Quality.png"  />
<h1> Here is all the information about the quality of the products,</h1> 
</head>

<?php
// on se connecte à notre base
$base = mysqli_connect ('127.0.0.1', 'root', '', 'labsession4_seigneur');
?>
<body>

<?php
  $host = '127.0.0.1';
  $dbname = 'labsession4_seigneur';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM quality_test NATURAL JOIN flaw";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<body>

 <style type="text/css">
	.col { float: left; width: 31%; min-width: 100px; text-align: center }
	.clear { clear: both; }
</style>
<div style="font-family:Garamond; color:white; font-size:23px; text-shadow: 0 0 8px #000000;" class="col left"><u>
	Tests results
</u></div>
<div style="font-family:Garamond; color:white; font-size:23px; text-shadow: 0 0 8px #000000;" class="col mid"><u>
	Flaw summary
</u></div>

<div class="clear"></div>
 <table>
   <thead>
     <tr>
       <th>Order ID</th>
       <th>Type of product</th>
	   <th>Product ID</th>
	   <th>State</th>
	   <th>Flaw ID</th>
	   <th>       </th>
       <th>Flaw ID</th>
	   <th>Flaw type</th>
	   <th>Severity</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['order_id']); ?></td>
       <td><?php echo htmlspecialchars($row['product_type']); ?></td>
	   <td><?php echo htmlspecialchars($row['product_id']); ?></td>
	   <td><?php echo htmlspecialchars($row['state']); ?></td>
	   <td><?php echo htmlspecialchars($row['flaw_id']); ?></td>
	   <td> . . . </td>
       <td><?php echo htmlspecialchars($row['flaw_id']); ?></td>
	   <td><?php echo htmlspecialchars($row['flaw_type']); ?></td>
	   <td><?php echo htmlspecialchars($row['severity']); ?></td>
     <?php endwhile; ?>
   </tbody>
 </table>

<h1> Do you want to add the result from a quality test ?</h1>
<form action="Quality_test.php" method="get">
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Order Id: </div><input type="text" name="order_id"><br>
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Product type</div><input type="text" name="product_type"><br></br>
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Product Id</div><input type="text" name="product_id"><br></br>
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">State</div><input type="text" name="state"><br></br>
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Flaw Id</div><input type="text" name="flaw_id"><br></br>

<input class="favorite styled" type="submit" value="Submit"></br></br>
</form>
<form method="post" action="Homepage.php">
<input class="favorite styled" type="submit" value="Go back to homepage" />
</form>

</body>
</html>
