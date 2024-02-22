<h1 class="page-header">Producto</h1>


<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=products&a=Crud">Agregar Producto</a>
    <a class="btn btn-primary" href="?c=products&a=Vender">Vender Producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Referencia</th>
            <th>Precio</th>
            <th>Peso</th>
            <th>Categoria</th>
            <th>Stock</th>
            <th>FechaCreacion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->referencia; ?></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->peso; ?></td>
            <td><?php echo $r->categoria; ?></td>
            <td><?php echo $r->stock; ?></td>
            <td><?php echo $r->fechacreacion; ?></td>
            <td>
                <i class="glyphicon glyphicon-edit"><a href="?c=products&a=Crud&id=<?php echo $r->id; ?>"> Editar</a></i>
            </td>
            <td>
                <i class="glyphicon glyphicon-remove"><a href="?c=products&a=Eliminar&id=<?php echo $r->id; ?>"> Eliminar</a></i>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
