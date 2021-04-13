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
  $host = '127.0.0.1';
  $dbname = 'labsession4_seigneur';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM ordertable NATURAL JOIN cart WHERE Status<>3";
   
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

 <h1>Cart waiting orders</h1>
 <table>
   <thead>
     <tr>
       <th>Id</th>
       <th>Order Time</th>
	   <th>Completion Time</th>
	   <th>Status</th>
	   <th>Number of products</th>
	   <th>Type</th>
	   <th>Number of wheels</th>
	   <th>Number of bolts</th>
	   <th>Number of washers</th>
	   <th>Frame</th>
	   <th>Color of the wheels (1 for red, 2 for green, 3 for grey)</th>
	   <th>Wheel carrier mobile</th>
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
	   <td><?php echo htmlspecialchars($row['WheelsNb']); ?></td>
	   <td><?php echo htmlspecialchars($row['BoltsNb']); ?></td>
	   <td><?php echo htmlspecialchars($row['WashersNb']); ?></td>
	   <td><?php echo htmlspecialchars($row['Frame']); ?></td>
	   <td><?php echo htmlspecialchars($row['WheelColor']); ?></td>
	   <td><?php echo htmlspecialchars($row['WheelCarrierMobile']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>

<form method="get" action="Cart_waiting_orders_select.php">
  <select name="WheelMobility" id="WheelMobility">
    <option value="0">Mobile</option>
    <option value="1">Fix</option>
  </select>
  <select name="WheelColor" id="WheelColor">
    <option value="1">Red</option>
    <option value="2">Green</option>
	<option value="3">Grey</option>
  </select>
  <br>
  <input class="favorite styled" type="submit" value="Display">
</form>

<form method="post" action="Show_waiting_orders.php">
<input class="favorite styled" type="submit" value="Go back to all waiting orders"/>
</form>

</body>
</html>