<?php if ($articulos): ?>
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th width="20%">Articulo</th>
			<th>Fotos</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($articulos as $articulo): ?>
<tr>
            <td>
                <p><?php echo $articulo->nombre; ?></p>
                <p>Sección: <?php echo $articulo->seccion_id; ?></p>
                    <span class="btn-group">
                        <?php echo Html::anchor('articulo/delete/'.$articulo->id, '<i class="icon-trash"></i> Borrar', array('class'=>'btn', 'onclick' => "return confirm('Seguro desea Borrar el Articulo?')")); ?>
                        <?php echo Html::anchor('articulo/edit/'.$articulo->id, '<i class="icon-edit"></i> Editar',array('class'=>'btn')); ?>
                    </span>
            </td>

			<td>



                <?php if ($articulo->fotos): ?>
                    <ul class="thumbnails">
                        <?php foreach ($articulo->fotos as $foto): ?>
                        <li class="thumbnail">
                            <?php echo Asset::img($foto->imagen, array('width' => '110',
                            'height' => '110',
                            'class' => 'detalle',
                            'data-content' => "Dimensiones: media<br/>Seccion:deportes",
                            'alt' => $foto->imagen,
                            'data-original-title' => $foto->imagen
                        )); ?>

                            <span class="btn-group">
                            <?php echo Html::anchor('#', ' <i class="icon-eye-open"></i>', array('class' => 'btn detalles_foto', 'rel' => 'tooltip', 'data-original-title' => 'Ver detalles foto')); ?>

                                <?php echo Html::anchor('foto/delete/' . $foto->id, '<i class="icon-trash"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Borrar foto del articulo', 'onclick' => "return confirm('Seguro desea Borrar la foto?')")); ?>

                                <?php if ($foto->estado == 0): ?>
                                <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>', array('class' => 'btn btn-warning', 'rel' => 'tooltip', 'data-original-title' => 'Foto a aprobar por el editor')); ?>
                                <?php elseif ($foto->estado == 1): ?>
                                <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>', array('class' => 'btn btn-success', 'rel' => 'tooltip', 'data-original-title' => 'Foto aprobada por el editor')); ?>
                                <?php elseif ($foto->estado == 2): ?>
                                <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>', array('class' => 'btn btn-warning', 'rel' => 'tooltip', 'data-original-title' => 'Foto rechazada por el editor')); ?>
                                <?php endif;?>
                        </span>

                        </li>
                        <?php endforeach; ?>
                    </ul>

                    <?php else: ?>
                    <p>No Fotos.</p>
                    <?php endif; ?>


			</td>
		</tr>
<?php endforeach; ?>
</tbody>
</table>

<?php else: ?>
<p>No Articulos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('articulo/create', 'Add new Articulo', array('class' => 'btn success')); ?>

</p>
