$<?php 
	class Carrito {
		public $id_cliente;
		public $codigo_barras;
	}

	class Producto {
		public $codigo_barras;
		public $id_seccion;
		public $precio;
		public $cantidad;
		public $nombre;
		public $descripcion;
	}

	class Cliente {
		public $id_cliente;
		public $nombre;
	}

	class Seccion {
		public $id_seccion;
		public $categoria;
		public $nombre_seccion;
	}


?>