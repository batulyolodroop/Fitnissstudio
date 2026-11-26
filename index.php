<?php
session_start();
?>

<?php
$host = 'v2201910106725100809.hotsrv.de';
$db   = 'db_6it24g1_db1';
$user = 'db_6it24g1_db1';
$pass = 'GiNTRrLd3?CUQkXUkj';

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (\PDOException $e) {
    die("Datenbankverbindung fehlgeschlagen: " . $e->getMessage());
}

include('zusatz/session.php');

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventarverwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</head>
<body>
<?php include('zusatz/Nav.php'); ?>

<?php
$page = "";
    if(isset($_GET['page'])) $page = htmlentities($_GET['page']);
    switch($page) {
      case 'login': include('zusatz/Login.php'); break;
      case 'list': include('LehrmittelHome.php'); break;
      case 'raum': include('Raum/Raum.php'); break;
      case 'schrank': include('Raum/Schrank.php'); break;
      case 'fach': include('Raum/Fach.php'); break;
      case 'lehrkraft': include('Lehrkraft.php'); break;
      case 'tags': include('Tags.php'); break;
      default: include('zusatz/Login.php'); break;
    }
?>

<?php include('Dark.php'); ?>
</body>
</html>