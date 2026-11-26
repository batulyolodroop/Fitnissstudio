<?php 
$host = 'localhost';
$db   = 'db_6it24g1_db1';
$user = 'db_6it24g1_db1';
$pass = 'Fitnessstudios1234';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("Could not connect. " . $e->getMessage());
}

try {
  $sql = "Select * From Tbl_Trainer";
  // Prepare the SQL query template
  $stmt = $conn->prepare($sql);
  // Execute with values
  $stmt->execute([]);
  echo "New records created successfully";
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$stmt = null;
$conn = null;
?> 


<!DOCTYPE html>
<html lang="de">
<head>
<h1>asfsaf</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

