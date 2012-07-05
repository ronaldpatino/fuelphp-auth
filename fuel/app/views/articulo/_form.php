<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Nombre', 'nombre'); ?>

			<div class="input">
				<?php echo Form::input('nombre', Input::post('nombre', isset($articulo) ? $articulo->nombre : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Periodista id', 'periodista_id'); ?>

			<div class="input">
				<?php echo Form::input('periodista_id', Input::post('periodista_id', isset($articulo) ? $articulo->periodista_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Seccion id', 'seccion_id'); ?>

			<div class="input">
				<?php echo Form::input('seccion_id', Input::post('seccion_id', isset($articulo) ? $articulo->seccion_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>