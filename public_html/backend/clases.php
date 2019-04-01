$<?php
	class Carrito {
		public $id_cliente;
		public $codigo_barras;
	}

	class ProductoBase{
		public $codigo_barras;
		public $precio;
		public $nombre;
	}

	class Producto extends ProductoBase{
		public $descripcion;
	}

	class Cliente {
		public $id_cliente;
		public $nombre;
	}



?>
