<h2>Usuarios</h2>
<br>
<?php if ($usuarios): ?>
<table class="table table-striped table-bordered table-condensed">
    <thead>
    <tr>
        <th>Nombre de usuario</th>
        <th>Rol</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
    <tr >

        <td>
            <?php echo $usuario->username;?>
        </td>

        <?php if ($usuario->group == 50): ?>
        <td>
            Editor
        </td>
        <?php elseif ($usuario->group == 100): ?>
        <td>
            Administrador
        </td>
        <?php else: ?>
        <td>
            Cronista
        </td>
        <?php endif;?>


        <td>
            <?php echo Html::anchor('manager/view/' . $usuario->id, 'Ver'); ?> |
            <?php echo Html::anchor('manager/edit/' . $usuario->id, 'Editar'); ?> |
            <?php if ($usuario->username !== "admin"): ?>
            <?php echo Html::anchor('manager/delete/' . $usuario->id, 'Borrar', array('onclick' => "return confirm('Seguro desea borrar el usuario {$usuario->username}')")); ?>
            <?php endif;?>

        </td>
    </tr>

        <?php endforeach; ?>    </tbody>
</table>

<?php else: ?>
<p>No existen usuarios.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('manager/create', 'Crear usuario', array('class' => 'btn success')); ?>

</p>
