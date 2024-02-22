<?php
require_once 'Model/products.php';

class productsController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
    }
    
    public function Index(){
        require_once 'View/header.php';
        require_once 'View/products.php';
        require_once 'View/footer.php';
    }
    
    public function Crud(){
        $alm = new Producto();
        
        if(isset($_REQUEST['id'])){
            $alm = $this->model->getting($_REQUEST['id']);
        }
        
        require_once 'View/header.php';
        require_once 'View/products-editar.php';
        require_once 'View/footer.php';
    }


    public function Vender(){
        require_once 'View/header.php';
        require_once 'View/Vender_product.php';
        require_once 'View/footer.php';
    }
    

    public function Guardar(){
      $alm = new Producto();

        $alm->id = $_REQUEST['id'] ?? null;
        $alm->nombre = $_REQUEST['Nombre'] ?? null;
        $alm->referencia = $_REQUEST['Referencia'] ?? null;
        $alm->precio = $_REQUEST['Precio'] ?? null;
        $alm->peso = $_REQUEST['Peso'] ?? null;
        $alm->categoria = $_REQUEST['Categoria'] ?? null;
        $alm->stock = $_REQUEST['Stock'] ?? null;
        $alm->fechacreacion = $_REQUEST['FechaCreacion'] ?? null;

        // Si el ID del producto es mayor que cero (0), indica que es una actualización en la tabla de productos,
        // de lo contrario, significa que es un nuevo registro
        if ($alm->id > 0) {
            $this->model->Actualizar($alm);
        } else {
            $this->model->Registrar($alm);
        }

        header('Location: index.php');

    }


    public function GuardarCompra(){
        $alm = new Producto();

        $alm->id = $_REQUEST['id'] ?? null;
        $alm->cantidad = $_REQUEST['cantidad'] ?? null;

        $cantidadtotal = $this->model->Cantidad($alm);

        // Verificar si la cantidad es mayor que cero
        if ($cantidadtotal >= $alm->cantidad) {
            $alm->nuevostock = ($cantidadtotal - $alm->cantidad);
            $this->model->ConfirmarVenta($alm);
            header('Location: index.php');
        } else {
            $mensajeError = "La cantidad a comprar es superior al inventario!";
        }
        
    }


    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
