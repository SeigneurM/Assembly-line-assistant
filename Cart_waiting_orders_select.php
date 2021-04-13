<!DOCTYPE html>
<html>
<head>
<title>ECAM Factory</title>

<style>
body {
	background-image: url("e7.jpg");
 background-repeat:repeat;
 background-size:auto;
} 
</style>

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
  
  $WheelMobility=$_GET["WheelMobility"];
  $WheelColor=$_GET["WheelColor"];
  
  $sql = "SELECT * FROM ordertable NATURAL JOIN cart WHERE Status<>3 AND WheelColor=$WheelColor AND WheelCarrierMobile=$WheelMobility";
   
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

 <h1 style="font-family:Tw Cen MT; color:white; font-size:23px; text-shadow: 0 0 8px #000000;">Cart waiting orders</h1>
 <table>
   <thead>
     <tr>
       <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Id</th>
       <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Order Time</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Completion Time</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Status</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Number of products</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Type</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Number of wheels</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Number of bolts</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Number of washers</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Frame</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Color of the wheels (1 for red, 2 for green, 3 for grey)</th>
	   <th style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;">Wheel carrier mobile</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['Id']); ?></td>
       <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['OrderTime']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['CompletionTime']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['Status']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['ProductNb']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['Type']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['WheelsNb']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['BoltsNb']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['WashersNb']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['Frame']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['WheelColor']); ?></td>
	   <td style="font-family:Agency FB; color:white; font-size:23px; text-shadow: 0 0 15px #000000;"><?php echo htmlspecialchars($row['WheelCarrierMobile']); ?></td>
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>


<form method="post" action="Show_waiting_orders.php">
<input type="submit" value="Go back to all waiting orders"/>
</form>

</body>
</html>