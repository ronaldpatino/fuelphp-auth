<style type="text/css">
    .btn-group {
        margin-left: 0px;
    }
</style>

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
            <p><strong><?php echo $articulo->nombre; ?></strong></p>

            <p><strong>Sección:</strong> <?php echo $articulo->seccion->descripcion; ?></p>
            <p><strong>P&aacute;gina:</strong> <?php echo $articulo->pagina->descripcion; ?></p>

            <p><strong>Fecha de Publicaci&oacute;n:</strong> <?php echo date('Y-m-d H:i:s', $articulo->fecha_publicacion); ?></p>
            <div class="btn-group">
                <?php echo Html::anchor('galeria/index/'.$articulo->id, '<i class="icon-picture"></i> Foto', array('class' => 'btn')); ?>
                <?php if ($articulo->fotos && $acceso_web): ?>
                <?php echo Html::anchor('foto/zip/'.$articulo->id, '<i class="icon-arrow-down"></i>Bajar', array('class' => 'btn btn-success'));?>
                <?php endif;?>
            </div>
        </td>

        <td>

            <?php if ($articulo->fotos): ?>
            <ul class="thumbnails" data-toggle="modal-gallery" data-target="#modal-gallery">
                <?php foreach ($articulo->fotos as $foto): ?>
                <li class="thumbnail">
                    <?php echo Myhtml::img($foto->imagen, array('width' => '110',
                    'height' => '110',
                    'class' => 'detalle',
                    'data-content' => "Dimensiones: {$foto->dimension->descipcion}<br/>Seccion: {$articulo->seccion->descripcion}<br/>P&aacute;gina: {$articulo->pagina->descripcion}",
                    'alt' => $foto->imagen,
                    'data-original-title' => $foto->imagen
                )); ?>

                    <div class="btn-group">
                        <a href="<?php echo Myhtml::img_watermark($foto->imagen);?>" class='btn detalles_foto'
                           rel='gallery' title='<?php echo $articulo->nombre; ?>'
                           alt='<?php echo $articulo->nombre; ?>'>
                            <i class="icon-eye-open"></i>
                        </a>

                        <!-- echo Html::anchor('foto/delete/' . $foto->id, '<i class="icon-trash"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Borrar foto del articulo', 'onclick' => "return confirm('Seguro desea Borrar la foto?')")); -->

                        <?php if ($foto->estado == 0): ?>
                        <?php echo Html::anchor('editor/aprobar/' . $foto->id . '/' . $periodista->id, '<i class="icon-ok-sign"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Aprobar Foto')); ?>
                        <?php echo Html::anchor('editor/rechazar/' . $foto->id . '/' . $periodista->id, '<i class="icon-ban-circle"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Rechazar Foto')); ?>
                        <?php elseif ($foto->estado == 1): ?>
                        <?php echo Html::anchor('#', '<i class="icon-ok-sign"></i>', array('class' => 'btn btn-success', 'rel' => 'tooltip', 'data-original-title' => 'Foto Aprobada')); ?>
                        <?php echo Html::anchor('editor/rechazar/' . $foto->id . '/' . $periodista->id, '<i class="icon-ban-circle"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Rechazar Foto')); ?>
                        <?php elseif ($foto->estado == 2): ?>
                        <?php echo Html::anchor('editor/aprobar/' . $foto->id . '/' . $periodista->id, '<i class="icon-ok-sign"></i>', array('class' => 'btn', 'rel' => 'tooltip', 'data-original-title' => 'Foto Aprobada')); ?>
                        <?php echo Html::anchor('#', '<i class="icon-ban-circle"></i>', array('class' => 'btn btn-danger', 'rel' => 'tooltip', 'data-original-title' => 'Rechazar Foto')); ?>
                        <?php endif;?>
                    </div>

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
    <div class="modal-body">
        <div class="modal-image"></div>
    </div>
</div>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<?php else: ?>
<p>No Articulos.</p>

<?php endif; ?>
