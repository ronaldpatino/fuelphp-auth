<?php echo Form::open(array('action' => 'articulo/create','class' => 'well form-inline')); ?>

	<fieldset>

            <?php echo Form::input('nombre', Input::post('nombre', isset($articulo) ? $articulo->nombre : ''), array('class' => 'input-xlarge', 'placeholder'=>'Nombre del Articulo')); ?>
    		<?php echo Form::hidden('periodista_id', $user_id); ?>

            <?php echo Form::select('pagina_id', $pagina_id, $select_paginas, array('style' => 'width: 80px;'));?>
            <?php echo Form::select('seccion_id', $seccion_id, $select_secciones );?>

            <div class="input-append date" id="dp2" data-date="<?php echo date('Y-m-d');?>"  data-date-format="yyyy-mm-dd">
                <input class="span2" size="16" type="text" value="<?php echo date('Y-m-d');?>" readonly="" name="fecha_publicacion">
                <span class="add-on"><i class="icon-calendar"></i></span>
            </div>

			<?php echo Form::submit('submit', 'Crear Articulo', array('class' => 'btn btn-primary')); ?>


	</fieldset>
<?php echo Form::close(); ?>


<script type="text/javascript" >
$(document).ready(function() {
    $('#dp2').datepicker({startDate: '<?php echo date('Y-m-d');?>',autoclose:true,todayHighlight:true});
});
</script>