<h1 class="page-header">
    <?php echo 'Vender Producto'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=products">Vender Producto</a></li>
  <li class="active"><?php echo 'Vender Producto'; ?></li>
</ol>

<form action="?c=products&a=GuardarCompra" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id"  />
    
    <div class="form-group">
        <label>Id Producto</label>
        <input type="text" name="id"  class="form-control" placeholder="Ingrese id del producto a comprar" data-validacion-tipo="requerido|min:1" />
    </div>
    <div class="form-group">
        <label>Cantidad Producto</label>
        <input type="text" name="cantidad"  class="form-control" placeholder="Ingrese la cantidad del producto a comprar" data-validacion-tipo="requerido|min:1" />
    </div>
 
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar Compra</button>
    </div>
    <div id="mensaje-error" class="alert alert-danger" style="display: <?php echo isset($mensajeError) ? 'block' : 'none'; ?>;"><?php echo $mensajeError ?? ''; ?></div>


</form>

<script>
    $(document).ready(function(){

        $("#frm-products").submit(function(){
            if ($("#mensaje-error").html() !== '') {
                $("#mensaje-error").show();
                return false; // Impide que se envíe el formulario si hay un error
            }
            return $(this).validate();
        });

    })
</script>
