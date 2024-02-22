<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=products">Producto</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=products&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese nombre completo del producto" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Referencia</label>
        <input type="text" name="Referencia" value="<?php echo $alm->referencia; ?>" class="form-control" placeholder="Ingrese referencia del producto" data-validacion-tipo="requerido|min:7" />
    </div>
    
    <div class="form-group">
        <label>Precio</label>
        <input type="number" name="Precio" value="<?php echo $alm->precio; ?>" class="form-control" placeholder="Ingrese el Precio del producto" data-validacion-tipo="requerido|number" />
    </div>
    
    <div class="form-group">
        <label>Peso</label>
        <input type="text" name="Peso" value="<?php echo $alm->peso; ?>" class="form-control" placeholder="Ingrese el peso del producto" data-validacion-tipo="requerido|min:2" />
    </div>
    
    <div class="form-group">
        <label>Categoria</label>
        <input type="text" name="Categoria" value="<?php echo $alm->categoria; ?>" class="form-control" placeholder="Ingrese la categoria" data-validacion-tipo="requerido|min:2" />
    </div>
 

     <div class="form-group">
        <label>Stock</label>
        <input type="text" name="Stock" value="<?php echo $alm->stock; ?>" class="form-control" placeholder="Ingrese la cantidad inicial de inventario" data-validacion-tipo="requerido|min:1" />
    </div>


    <div class="form-group">
        <label>Categoria</label>
        <input type="date" name="FechaCreacion" value="<?php echo $alm->fechacreacion; ?>" class="form-control" placeholder="Ingrese la fecha de cargue" data-validacion-tipo="requerido|date" />
    </div>

    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-products").submit(function(){
            return $(this).validate();
        });
    })
</script>
