<?
/**/
//   $_POST['Numero_catalogo']="10001";
   $_POST['Id_cliente']="3";
   $_POST['Accion']="Mostrar";
/**/
if( !empty($_POST['Accion']) && !empty($_POST['Id_cliente']) )
{
    include 'conexion.php';

    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    } else {
        //importamos las clases
        include 'clases.php';
        $carro = new Carrito();
        $carro->id_cliente=$_POST['Id_cliente'];


        if (!empty($_POST['Numero_catalogo']))
        {
            $carro->codigo_barras=$_POST['Numero_catalogo'];
            if ($_POST['Accion']=='Agregar') {
                if($resultado = $conn->query("INSERT INTO carrito VALUES(".$carro->id_cliente.",".$carro->codigo_barras.")"))
                {
                    echo "exito";
                }else{
                    die("error al Agregar");
                }
            }else if ($_POST['Accion']=='Eliminar') {
                if($resultado = $conn->query("DELETE FROM carrito WHERE id_cliente =".$carro->id_cliente." AND codigo_barras=".$carro->codigo_barras) )
                {
                    echo "exito";
                }else{
                    die("error al Eliminar");
                }
            }
        }else if($_POST['Accion']=='Mostrar') {
            $consulta= "SELECT p.nombre,p.codigo_barras,p.precio from producto p join carrito c on p.codigo_barras = c.codigo_barras where c.id_cliente =".$carro->id_cliente;
            if($resultado = $conn->query($consulta))
            {
                $lista=[];
                //Array asociativo
                $i=0;
                while ($fila = $resultado->fetch_assoc()) {
                    $lista[$i] = new ProductoBase();
                    $lista[$i]->nombre = $fila['nombre'];
                    $lista[$i]->codigo_barras = $fila['codigo_barras'];
                    $lista[$i]->precio = $fila['precio'];
                    $i++;
                }
                    $valor=json_encode($lista);
                    $resultado->free();

                    echo $valor;
            }else {
                die("erro al mostrar");
            }
        }
        $conn->close();

    }
}
?>
