<?php
class Carrito
{
	private $id_catalogo;
	private $id_usuario;
	private $nombre;
	private $version;
	private $precio;
	private $cantidad;
	

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; } 
}

