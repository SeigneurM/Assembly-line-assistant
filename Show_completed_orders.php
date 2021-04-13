<!DOCTYPE html>
<html>
<head>
<title>ECAM Factory </title>

<link rel="stylesheet" href="style.css" />

</head>
<body>
<img alt="ECAM" align="right" width="284" height="142" src="Logo_ECAM_2015.jpg"   />
<img alt="COMPLETED ORDERS" align="center" src="completed_orders.png"  />

</body>

<?php
  $host = '127.0.0.1';
  $dbname = 'labsession4_seigneur';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM ordertable WHERE Status=3";
   
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

 <h1 style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Waiting orders</h1>
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
 
<form method="post" action="Completed_cart_orders.php">
<input class="favorite styled" type="submit" value="Show completed cart orders" />
</form>
<form method="post" action="Completed_indus_orders.php">
<input class="favorite styled" type="submit" value="Show completed industrial computer box orders" />
</form>
<form method="post" action="Show_waiting_orders.php">
<input class="favorite styled" type="submit" value="Show all waiting orders" />
</form>
<form method="post" action="Homepage.php">
<input class="favorite styled" type="submit" value="Go back to homepage" />
</form>

</body>
</html>