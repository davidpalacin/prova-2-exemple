<?php
// Datos para conectar a la base de datos.
$servername = "localhost";
$database = "clima";
$username = "root";
$password = "root";

// Create connection
$db = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
echo 'Se ha conectado a la bd'; 
echo '<br>';

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
    case 'movie':
        echo 'Quieres borrar esta ciudad?<br/>';
        break;
    case 'people':
        echo 'Quieres borrar este tiempo?<br/>';
        break;
    } 
    echo '<a href="' . $_SERVER['REQUEST_URI'] . '&do=1">yes</a> '; 
    echo 'or <a href="admin.php">no</a>';
} else {
    switch ($_GET['type']) {
    case 'movie':

        $query = 'DELETE FROM Ciutat  WHERE idCiutat= ' . $_GET['idCiutat'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your ciutat has been deleted.
<a href="admin.php">Return to Index</a></p>
<?php
        break;
    case 'people':
         $query = 'DELETE FROM Temps  WHERE idTemps = ' . $_GET['idTemps'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
<p style="text-align: center;">Your temps has been deleted.
<a href="admin.php">Return to Index</a></p>
<?php
        break;
    }
}
?>

