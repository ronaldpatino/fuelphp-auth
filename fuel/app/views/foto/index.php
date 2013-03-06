<style type="text/css">
    .btn-group {
        margin-left: 0px;
    }
</style>

<?php if ($fotos): ?>
<ul class="thumbnails">
    <?php foreach ($fotos as $foto): ?>
        <li class="thumbnail">
            <?php echo Asset::img($foto->imagen, array('width' => '110',
            'height' => '110',
            'class' => 'detalle',
            'data-content' => "Dimensiones: media<br/>Seccion:deportes",
            'alt' => $foto->imagen,
            'data-original-title' => $foto->imagen
        )); ?>

        <div class="btn-group">

            <?php echo Html::anchor('#', ' <i class="icon-eye-open"></i>',array('class'=>'btn detalles_foto', 'rel'=>'tooltip', 'data-original-title'=>'Ver detalles foto')); ?>

            <?php echo Html::anchor('foto/delete/'.$foto->id, '<i class="icon-trash"></i>',array('class'=>'btn','rel'=>'tooltip', 'data-original-title'=>'Borrar foto del articulo','onclick' => "return confirm('Are you sure?')")); ?>

            <?php if($foto->estado == 0):?>
                <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>',array('class'=>'btn btn-warning', 'rel'=>'tooltip', 'data-original-title'=>'Foto a aprobar por el editor')); ?>
            <?php elseif($foto->estado == 1):?>
                <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>',array('class'=>'btn btn-success', 'rel'=>'tooltip', 'data-original-title'=>'Foto aprobada por el editor')); ?>
            <?php elseif($foto->estado == 2):?>
                <?php echo Html::anchor('#', '<i class="icon-question-sign"></i>',array('class'=>'btn btn-warning', 'rel'=>'tooltip', 'data-original-title'=>'Foto rechazada por el editor')); ?>
            <?php endif;?>


        </div>

    </li>

    <?php endforeach; ?>
</ul>

<?php else: ?>
<p>No Fotos.</p>
<?php endif; ?>
