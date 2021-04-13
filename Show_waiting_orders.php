<!DOCTYPE html>
<html>
<head>
<title>ECAM Factory</title>

<link rel="stylesheet" href="style.css" />

</head>
<body>
<img alt="ECAM" align="right" width="284" height="142" src="Logo_ECAM_2015.jpg"   />
<img alt="WAITING ORDERS" align="center" src="waiting_orders.png" /><br/>

</body>
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
  $sql = "SELECT * FROM ordertable WHERE Status<>3";
   
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

 <h1>Cart waiting orders</h1>
 <table>
   <thead>
     <tr>
       <th>Id</th>
       <th>Order Time</th>
	   <th>Completion Time</th>
	   <th>Status</th>
	   <th>Number of products</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['Id']); ?></td>
       <td><?php echo htmlspecialchars($row['OrderTime']); ?></td>
	   <td><?php echo htmlspecialchars($row['CompletionTime']); ?></td>
	   <td><?php echo htmlspecialchars($row['Status']); ?></td>
	   <td><?php echo htmlspecialchars($row['ProductNb']); ?></td>
     <?php endwhile; ?>
   </tbody>
 </table>


<h1> Do you want to update an order ?</h1>
<form action="Update_order.php" method="get">
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Id: </div><input type="text" name="Id"><br>
<div style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Status (1 for ongoing, 2 for under production, 3 for completed): </div><input type="text" name="Status"><br></br>
<input class="favorite styled" type="submit" value="Update"></br></br>
</form>

<form method="post" action="Cart_waiting_orders.php">
<input class="favorite styled" type="submit" value="Show the cart waiting orders"/>
</form>
<form method="post" action="Indus_waiting_orders.php">
<input class="favorite styled" type="submit" value="Show the industrial computer box waiting orders"/>
</form>
<form method="post" action="Show_Completed_orders.php">
<input class="favorite styled" type="submit" value="Show all completed orders"/>
</form>
<form method="post" action="Homepage.php">
<input class="favorite styled" type="submit" value="Go back to homepage"/>
</form>

</body>
</html>