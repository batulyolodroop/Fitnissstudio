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

try {
  $sql = "SELECT Tbl_Mitglieder.PK_Mitglieder, Tbl_Mitglieder.Vorname, Tbl_Mitglieder.Nachname, Tbl_Mitgliedschaften.Name FROM Tbl_Mitglieder 
          INNER JOIN zTbl_MitgliedMitgliedschaften ON zTbl_MitgliedMitgliedschaften.FK_Mitglied = Tbl_Mitglieder.PK_Mitglieder
          INNER JOIN Tbl_Mitgliedschaften ON zTbl_MitgliedMitgliedschaften.FK_Mitgliedschaft = Tbl_Mitgliedschaften.PK_Mitgliedschaft";
  // Execute the SQL query
  $result = $conn->query($sql);
  // Process the result set
  if ($result->rowCount() > 0) {
    echo "<table><tr><th>ID</th><th>Vorname</th><th>Nachname</th></tr>";
    // Output data of each row
    while($row = $result->fetch()) {
      echo "<tr>";
      echo "<td>" . $row['PK_Mitglieder'] . "</td>";
      echo "<td>" . $row['Vorname'] . "</td>";
      echo "<td>" . $row['Nachname'] . "</td>";
      echo "</tr>";
    }
    echo "</table>";
    unset($result);
  } else {
    echo "No records found.";
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;

?>
