<!DOCTYPE html>
<html>
<head>
<title>ECAM Factory</title>

<link rel="stylesheet" href="style.css" />

</head>
<body>
<img alt="ECAM" align="right" width="284" height="142" src="Logo_ECAM_2015.jpg"   />
<img alt="COMPLETED ORDERS" align="center" src="Completed_orders.png" /><br/>

</body>
<?php
  $host = '127.0.0.1';
  $dbname = 'labsession4_seigneur';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les ordinateurs dont la commande est en attente
  $sql = "SELECT * FROM ordertable NATURAL JOIN induscomputerbox WHERE Status=3";
   
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

 <h1 style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Industrial computer box completed orders</h1>
 <table>
   <thead>
     <tr>
       <th>Id</th>
       <th>Order Time</th>
	   <th>Completion Time</th>
	   <th>Status</th>
	   <th>Number of products</th>
	   <th>Type</th>
	   <th>Number of relays</th>
	   <th>Number of sensors</th>
	   <th>Box</th>
	   <th>Raspberry</th>
	   <th>Electric connection cable</th>
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
	   <td><?php echo htmlspecialchars($row['Type']); ?></td>
	   <td><?php echo htmlspecialchars($row['RelaysNb']); ?></td>
	   <td><?php echo htmlspecialchars($row['SensorsNb']); ?></td>
	   <td><?php echo htmlspecialchars($row['Box']); ?></td>
	   <td><?php echo htmlspecialchars($row['Raspberry']); ?></td>
	   <td><?php echo htmlspecialchars($row['ElectricConnectionCable']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>


<form method="post" action="Show_completed_orders.php">
<input class="favorite styled" type="submit" value="Go back to all completed orders"/>
</form>

</body>
</html>