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
            <p>
                <?php echo Html::anchor('diagramador/zip/'.$articulo->id, '<i class="icon-arrow-down"></i> Descargar Zip', array('class' => 'btn btn-success'));?>
            </p>
        </td>

        <td>

            <?php if ($articulo->fotos): ?>
            <ul class="thumbnails" data-toggle="modal-gallery" data-target="#modal-gallery">
                <?php foreach ($articulo->fotos as $foto): ?>
                    <?php if ($foto->estado == 1):?>
                        <li class="thumbnail">
                            <a href="<?php echo $foto->imagen?>"  rel ='gallery' title = 'Ver detalles foto' alt='Ver detalles foto'>
                                <?php echo Myhtml::img($foto->imagen, array('width' => '110',
                                'height' => '110',
                                'class' => 'btn detalles_foto',
                                'data-content' => "Dimensiones: {$foto->dimension->descipcion}<br/>Seccion: {$articulo->seccion->descripcion}",
                                'alt' => $foto->imagen,
                                'data-original-title' => $foto->imagen
                            )); ?>
                            </a>
                            <br/>
                            <br/>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td><strong>Medida</strong></td>
                                    <td><?php echo $foto->dimension->descipcion;?></td>
                                </tr>
                                </tbody>
                            </table>
                        </li>
                    <?php endif;?>
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
