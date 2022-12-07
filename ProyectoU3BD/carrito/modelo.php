<?php 
class carritoModel
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

	public function Listar($idU)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM carrito where id_usuario = ?");
			$stm->execute(array($idU));

  

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Carrito();

				$alm->__SET('id_catalogo', $r->id_catalogo);
				$alm->__SET('id_usuario', $r->id_usuario);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('version', $r->version);
				$alm->__SET('precio', $r->precio);
				$alm->__SET('cantidad', $r->cantidad);
					

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idU,$idC)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM carrito WHERE WHERE id_usuario = ? and  id_catalogo = ? ");
			          

			$stm->execute(array($idU,$idC));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Carrito();

			$alm->__SET('id_catalogo', $r->id_catalogo);
			$alm->__SET('id_usuario', $r->id_usuario);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('version', $r->version);
			$alm->__SET('precio', $r->precio);
			$alm->__SET('cantidad', $r->cantidad);


			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function Eliminar($idC)
	{
		session_start();
		$idUsu = $_SESSION["idUsuario"];
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM carrito WHERE id_usuario = ? and  id_catalogo = ? ");			          

			$stm->execute(array($idUsu,$idC));
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function EliminarCarrito($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("DELETE FROM carrito WHERE id_usuario = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Carrito $data)
	{
		try 
		{ 
			$sql = "UPDATE carrito SET 
						nombre		 	=?,
						version			=?,
						precio		 	=?,
						cantidad		=? 
				    WHERE id_catalogo = ? and id_usuario= ?";
					
				

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombre'), 
					$data->__GET('version'), 
					$data->__GET('precio'),
					$data->__GET('cantidad'),
                    $data->__GET('id_catalogo'),
					$data->__GET('id_usuario')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Carrito $data)
	{
		try 
		{
		$sql = "INSERT INTO `carrito`(id_catalogo, id_usuario, nombre, version, precio, cantidad) 
                VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id_catalogo'),
				$data->__GET('id_usuario'),
                $data->__GET('nombre'), 
				$data->__GET('version'), 
				$data->__GET('precio'),
				$data->__GET('cantidad')
				)
			);
			
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}