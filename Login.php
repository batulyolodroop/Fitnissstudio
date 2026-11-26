<?php
session_start();
?>

<?php
$host = 'v2201910106725100809.hotsrv.de';
$db   = 'db_6it24g1_db1';
$user = 'db_6it24g1_db1';
$pass = 'GiNTRrLd3?CUQkXUkj';

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
  die("Could not connect. " . $e->getMessage());
}

try {
  $sql = "INSERT INTO MyGuests () VALUES ()";
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