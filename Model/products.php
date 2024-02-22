<?php
class Producto
{
    private $pdo;
    
    public $id;
    public $nombre;
    public $referencia;
    public $cantidad;
    public $nuevostock;
    public $precio;
    public $peso;
    public $categoria;
    public $stock;
    public $fechacreacion;

    public function __CONSTRUCT()
    {
        try
        {
            $this->pdo = Conexion::StartUp();     
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

            $stm = $this->pdo->prepare("SELECT * FROM products");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function getting($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM products WHERE id = ?");
                      

            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

   public function Cantidad($data)
    {
        try 
        {
            $stm = $this->pdo->prepare("SELECT stock FROM products WHERE id = ?");
            $stm->execute(array($data->id));
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            
            return (int)$result['stock']; // Asegúrate de convertir a entero

        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }


    public function ConfirmarVenta($data)
    {
        try 
        {
            $sql = "INSERT INTO ventas (id_producto, cantidad) VALUES (?, ?)";            
            $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->id, 
                    $data->cantidad              
                )
            );
        } 
        catch (Exception $e) 
        {

            die($e->getMessage());
        }
    }
    

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                        ->prepare("DELETE FROM products WHERE id = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try 
        {
            $sql = "UPDATE products SET 
                        nombre          = ?, 
                        referencia        = ?,
                        precio        = ?,
                        peso            = ?, 
                        categoria = ?,
                        stock = ?,
                        fechacreacion = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                    array(
                        $data->nombre, 
                        $data->referencia,
                        $data->precio,
                        $data->peso,
                        $data->categoria,
                        $data->stock,
                        $data->fechacreacion,
                        $data->id
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Registrar($data)
    {
        try 
        {
        $sql = "INSERT INTO products (nombre,referencia,precio,peso,categoria,stock,fechacreacion) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
                        
        $this->pdo->prepare($sql)
             ->execute(
                array(
                    $data->nombre, 
                    $data->referencia,
                    $data->precio,
                    $data->peso,
                    $data->categoria,
                    $data->stock,
                    $data->fechacreacion                
                )
            );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }
}
?>
