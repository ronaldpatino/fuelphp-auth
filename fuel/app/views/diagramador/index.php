<?php if ($secciones): ?>
<table class="table table-striped table-bordered table-condensed">
    <thead>
    <tr>
        <th>Secciones</th>

    </tr>
    </thead>
    <tbody>
        <?php foreach ($secciones as $seccion): ?>
        <tr>
            <td>
                <?php echo Html::anchor('diagramador/seccion/'.$seccion['id'], $seccion['descripcion']); ?>

                <?php if ($secciones_articulo_count[$seccion['id']] > 0):?>
                    <span class="badge badge-warning"><?php echo $secciones_articulo_count[$seccion['id']];?></span>
                <?php else:?>
                    <span class="badge badge-inverse"><?php echo $secciones_articulo_count[$seccion['id']];?></span>
                <?php endif;?>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<p>No existen secciones creadas.</p>
<?php endif; ?>





