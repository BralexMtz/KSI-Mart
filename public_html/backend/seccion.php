<?php
$_POST['Seccion']="Farmacia";
if (!empty($_POST['Seccion'])) {

    include 'conexion.php';

    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        $query = $conn->query("SELECT * FROM producto WHERE id_seccion = (SELECT id_seccion FROM seccion WHERE nombre_seccion='".$_POST['Seccion']."')");
        echo $_POST['Seccion']."<br>";
        print_r($query);
        

    }
}
?>
