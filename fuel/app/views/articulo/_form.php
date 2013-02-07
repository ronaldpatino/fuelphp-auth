<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Nombre', 'nombre'); ?>

			<div class="input">
				<?php echo Form::input('nombre', Input::post('nombre', isset($articulo) ? $articulo->nombre : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<?php echo Form::hidden('periodista_id', Input::post('periodista_id', isset($articulo) ? $articulo->periodista_id : ''), array('class' => 'span6')); ?>

		<div class="clearfix">
			<?php echo Form::label('Seccion', 'seccion_id'); ?>
			<div class="input">
                <?php echo Form::select('seccion_id', isset($articulo) ? $articulo->seccion_id : 'none', $select_secciones);?>
			</div>
		</div>

        <div class="clearfix">
            <?php echo Form::label('P&aacute;gina', 'pagina_id'); ?>
            <div class="input">
                <?php echo Form::select('pagina_id', isset($articulo) ? $articulo->pagina_id : 'none', $select_paginas);?>
            </div>
        </div>

        <div class="input-append date" id="dp2" data-date="<?php echo Date::forge($articulo->fecha_publicacion)->format("%Y-%m-%d");?>"  data-date-format="yyyy-mm-dd">
            <input class="span2" size="16" type="text" value="<?php echo Date::forge($articulo->fecha_publicacion)->format("%Y-%m-%d");?>" readonly="" name="fecha_publicacion">
            <span class="add-on"><i class="icon-calendar"></i></span>
        </div>


        <div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>

<script type="text/javascript" >
    $(document).ready(function() {
        $('#dp2').datepicker({startDate: '<?php echo date('Y-m-d');?>',autoclose:true,todayHighlight:true});
    });
</script>