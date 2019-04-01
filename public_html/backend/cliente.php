<?php
//$_POST['Nombre']="Brayan Alexis Mart";
if (!empty($_POST['Nombre'])) {

    include 'conexion.php';
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        //importamos las clases
        include 'clases.php';
        //Hacemos la insercion
        $cliente = new Cliente();
        $cliente->nombre = $_POST['Nombre'];

        if($resultado = $conn->query("INSERT INTO cliente(nombre) VALUES('".$cliente->nombre."')"))
        {

                $resultado2=$conn->query("SELECT id_cliente FROM cliente WHERE nombre='".$_POST['Nombre']."'");
                $row=$resultado2->fetch_assoc();

                $cliente->id_cliente=$row['id_cliente'];
                $resultado2->free();
                $conn->close();

                echo $cliente->id_cliente;

        }
    }
}
?>
