<?php echo render('articulo/_form_inline'); ?>

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
                <p>Sección: <?php echo $articulo->seccion->descripcion; ?></p>
                    <span class="btn-group">
                        <?php echo Html::anchor('articulo/delete/'.$articulo->id, '<i class="icon-trash"></i> Borrar', array('class'=>'btn', 'onclick' => "return confirm('Seguro desea Borrar el Articulo?')")); ?>
                        <?php echo Html::anchor('galeria', '<i class="icon-picture"></i> Foto', array('class'=>'btn')); ?>
                        <?php echo Html::anchor('articulo/edit/'.$articulo->id, '<i class="icon-edit"></i> Editar',array('class'=>'btn')); ?>
                    </span>
            </td>

			<td>



                <?php if ($articulo->fotos): ?>
                    <ul class="thumbnails" data-toggle="modal-gallery" data-target="#modal-gallery">
                        <?php foreach ($articulo->fotos as $foto): ?>
                        <li class="thumbnail">
                            <?php echo Myhtml::img($foto->imagen, array('width' => '110',
                            'height' => '110',
                            'class' => 'detalle',
                            'data-content' => "Dimensiones: media<br/>Seccion:deportes",
                            'alt' => $foto->imagen,
                            'data-original-title' => $foto->imagen
                        )); ?>

                            <span class="btn-group">
                                <a href="<?php echo $foto->imagen?>" class='btn detalles_foto' rel ='gallery' title = 'Ver detalles foto' alt='Ver detalles foto'>
                                    <i class="icon-eye-open"></i>
                                </a>
                                <?php echo Html::anchor('foto/delete/' . $foto->id, '<i class="icon-trash"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Borrar foto del articulo', 'onclick' => "return confirm('Seguro desea Borrar la foto?')")); ?>

                                <?php if ($foto->estado == 0): ?>
                                    <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>', array('class' => 'btn btn-warning', 'rel' => 'tooltip', 'data-original-title' => 'Foto a aprobar por el editor')); ?>
                                <?php elseif ($foto->estado == 1): ?>
                                    <?php echo Html::anchor('#', '<i class="icon-ok-sign"></i>', array('class' => 'btn btn-success', 'rel' => 'tooltip', 'data-original-title' => 'Foto aprobada por el editor')); ?>
                                <?php elseif ($foto->estado == 2): ?>
                                    <?php echo Html::anchor('#', '<i class="icon-ban-circle"></i>', array('class' => 'btn btn-danger', 'rel' => 'tooltip', 'data-original-title' => 'Foto rechazada por el editor')); ?>
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

<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">

        <form class="well form-inline" id="searchForm" action="/gr/foto/add/">
            <a class="btn modal-download" target="_blank">
                <i class="icon-download"></i>
                <span>Descargar</span>
            </a>
            <input name='periodista_id' id="form_periodista_id"  type="hidden"/>

            <span id="articulo_container"></span>
            <span id="dimension_container"></span>

        </form>
    </div>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->

<?php else: ?>
<p>No Articulos.</p>

<?php endif; ?>
