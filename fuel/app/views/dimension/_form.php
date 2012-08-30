<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Descipcion', 'descipcion'); ?>

			<div class="input">
				<?php echo Form::input('descipcion', Input::post('descipcion', isset($dimension) ? $dimension->descipcion : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Guardar', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>