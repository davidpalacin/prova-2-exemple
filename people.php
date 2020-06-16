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

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            tempAlta, tempBaixa, precipitacio
        FROM
            Temps
        WHERE
            idTemps = ' . $_GET['idTemps'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $tempAlta = '';
    $tempBaixa = 0;
    $precipitacio = 0;
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Temps</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=people"
   method="post">
   <table>
    <tr>
     <td>Temp Alta: </td>
     <td><input type="text" name="tempAlta"
      value="<?php echo $tempAlta; ?>"/></td>
    </tr><tr>
     <td>Temp Baixa</td>
     <td><input type="text" name="tempBaixa"
      value="<?php echo $tempBaixa; ?>"/></td>
    </tr>
    <tr>
     <td>Precipitacio: </td>
     <td><input type="text" name="precipitacio"
      value="<?php echo $precipitacio; ?>"/></td>
    </tr>

<?php
if ($_GET['action'] == 'edit') {

    echo '<input type="hidden" value="' . $_GET['idTemps'] . '" name="idTemps" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
