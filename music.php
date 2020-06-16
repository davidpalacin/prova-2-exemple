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
            codi, nom, poblacio
        FROM
            Ciutat
        WHERE
            idCiutat = ' . $_GET['idCiutat'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $codi = '';
    $nom = '';
    $poblacio = '';

}

?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> Ciutat</title>
 </head>
 <body>
  <form action="commit.php?action=<?php echo $_GET['action']; ?>&type=movie"
   method="post">
   <table>
    <tr>
     <td>Codi</td>
     <td><input type="text" name="codi"
      value="<?php echo $codi; ?>"/></td>
    </tr>

    <tr>
     <td>Nom</td>
     <td><input type="text" name="nom"
      value="<?php echo $nom; ?>"/></td>
    </tr>
    
    <tr>
     <td>Poblacio</td>
     <td><input type="text" name="poblacio"
      value="<?php echo $poblacio; ?>"/></td>
    </tr>

    <tr>
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['idCiutat'] . '" name="idCiutat" />';
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
