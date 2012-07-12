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
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>