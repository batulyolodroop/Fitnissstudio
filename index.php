<?php 
$host = 'localhost';
$db   = 'db_6it24g1_db1';
$user = 'db_6it24g1_db1';
$pass = 'Fitnessstudios1234'; 

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
    if(isset($_GET['Webseite'])) $page = htmlentities($_GET['Webseite']);
    switch($Webseite) {
      case 'login': include('Webseite/Login.php'); break;
      case 'Geräteverwaltung': include('Webseite/Geräteverwaltung.php'); break;
      case 'Kurseverwaltung': include('Webseite/Kurseverwaltung.php'); break;
      case 'Mitgliedverwaltung': include('Webseite/Mitgliedverwaltung.php'); break;
      case 'Personalverwaltung': include('Webseite/Personalverwaltung.php'); break;
      case 'Produktverwaltung': include('Webseite/Produktverwaltung.php'); break;
      case 'Trainerverwaltung': include('Webseite/Trainerverwaltung.php'); break;
      default: include('Webseite/Login.php'); break;
    }
?>

<?php include('Dark.php'); ?>

<ul>
  <li><a href="Webseite/Mitgliederverwaltung.php">Mitgliedverwaltung</a></li>
  <li><a href="news.asp">News</a></li>
  <li><a href="contact.asp">Contact</a></li>
  <li><a href="about.asp">About</a></li>
</ul>
</body>
</html>