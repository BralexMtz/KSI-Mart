<?php
//$_POST['Seccion']="Farmacia";
if (!empty($_POST['Seccion'])) {

    include 'conexion.php';

    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        include 'clases.php';
        $resultado = $conn->query("SELECT codigo_barras,nombre,precio,descripcion FROM producto WHERE id_seccion = (SELECT id_seccion FROM seccion WHERE nombre_seccion='".$_POST['Seccion']."')");
        echo $_POST['Seccion']."<br>";

        $seccion=[];
        //Array asociativo
        $i=0;
        while ($fila = $resultado->fetch_assoc()) {
               $seccion[$i]= new Producto();
               $seccion[$i]->codigo_barras = $fila["codigo_barras"];
               $seccion[$i]->precio = $fila["precio"];
               $seccion[$i]->nombre = $fila["nombre"];
               $seccion[$i]->descripcion = $fila["descripcion"];
               $i++;
        }
            $valor=json_encode($seccion);
            $resultado->free();
            $conn->close();

            echo $valor;
           /* liberar el conjunto de resultados */

    }
}
?>
