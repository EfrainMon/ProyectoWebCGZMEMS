<?php
class Producto
{
	private $id_catalogo;
	private $nombre_videojuego;
	private $version;
	private $precio;
	private $stock;
	private $imgLink;
	private $descripcion;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; } 
}

