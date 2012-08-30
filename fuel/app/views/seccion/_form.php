<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Descripcion', 'descripcion'); ?>

			<div class="input">
				<?php echo Form::input('descripcion', Input::post('descripcion', isset($seccion) ? $seccion->descripcion : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Guardar', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>