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
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'INSERT INTO
            Ciutat
                (codi, nom,
                poblacio)
            VALUES
                ("' . $_POST['codi'] . '",
                "' . $_POST['nom'] . '",
                "' . $_POST['poblacio'] . '")';
        break;
    case 'people':
        $query = 'INSERT INTO
            Temps
                (tempAlta, tempBaixa, precipitacio)
            VALUES
                (' . $_POST['tempAlta'] . ',
                 ' . $_POST['tempBaixa'] . ',
                 ' . $_POST['precipitacio'] . ')';
        break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'UPDATE Ciutat SET
                codi = "' . $_POST['codi'] . '",
                nom = "' . $_POST['nom'] . '",
                poblacio = "' . $_POST['poblacio'] . '"
            WHERE
                idCiutat = ' . $_POST['idCiutat'];
        break;
    case 'people':
    $query = 'UPDATE Temps SET
            tempAlta = ' . $_POST['tempAlta'] . ',
            tempBaixa = ' . $_POST['tempBaixa'] . ',
            precipitacio = ' . $_POST['precipitacio'] . '
        WHERE
            idTemps = ' . $_POST['idTemps'];
        break;  
    }
    

    break;
}
if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
