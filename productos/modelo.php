<?php 
class productoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=tienda_gs', 'root', '');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM catalogo");
			$stm->execute();

  

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Producto();

				$alm->__SET('id_catalogo', $r->id_catalogo);
				$alm->__SET('nombre_videojuego', $r->nombre_videojuego);
				$alm->__SET('version', $r->version);
				$alm->__SET('precio', $r->precio);
				$alm->__SET('stock', $r->stock);
                $alm->__SET('imgLink', $r->imgLink);
                $alm->__SET('descripcion', $r->descripcion);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM catalogo WHERE id_catalogo = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Producto();

			$alm->__SET('id_catalogo', $r->id_catalogo);
            $alm->__SET('nombre_videojuego', $r->nombre_videojuego);
            $alm->__SET('version', $r->version);
            $alm->__SET('precio', $r->precio);
            $alm->__SET('stock', $r->stock);
            $alm->__SET('imgLink', $r->imgLink);
            $alm->__SET('descripcion', $r->descripcion);


			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM catalogo WHERE id_catalogo = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Producto $data)
	{
		try 
		{ 
			$sql = "UPDATE catalogo SET 
						nombre_videojuego   = ?, 
					    version             = ?,
						precio              = ?, 
						stock               = ?,
                        imgLink             = ?,
                        descripcion         = ?
				    WHERE id_catalogo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre_videojuego'), 
					$data->__GET('version'), 
					$data->__GET('precio'),
					$data->__GET('stock'),
                    $data->__GET('imgLink'),
                    $data->__GET('descripcion'),
					$data->__GET('id_catalogo')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(producto $data)
	{
		try 
		{
		$sql = "INSERT INTO`catalogo` (nombre_videojuego,version, precio, stock, imgLink, descripcion) 
                VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
                $data->__GET('nombre_videojuego'), 
                $data->__GET('version'), 
                $data->__GET('precio'),
                $data->__GET('stock'),
                $data->__GET('imgLink'),
                $data->__GET('descripcion')
				)
			);
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}