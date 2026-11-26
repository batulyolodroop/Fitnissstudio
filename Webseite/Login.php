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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<form method="post" action="login.php">

<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">
<button type="submit">Login</button>

</form>
</body>
</html>

<?php

if($_POST["username"] == "admin" && $_POST["password"] == "1234") {
  $_SESSION["username"] = $_POST["username"];
  $_SESSION["password"] = $_POST["password"];
}


// Output session variables that were set on previous page
if(isset($_SESSION["username"]) && isset($_SESSION["password"])) {
  echo "username is " . $_SESSION["username"] . ".<br>";
  echo "password is " . $_SESSION["password"] . ".";
} else {
  echo "No username or password found.";
}
?>