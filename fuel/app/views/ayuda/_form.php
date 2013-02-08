<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Menu', 'menu'); ?>

			<div class="input">
				<?php echo Form::input('menu', Input::post('menu', isset($ayuda) ? $ayuda->menu : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Titulo', 'titulo'); ?>

			<div class="input">
				<?php echo Form::input('titulo', Input::post('titulo', isset($ayuda) ? $ayuda->titulo : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Video', 'video'); ?>

			<div class="input">
				<?php echo Form::textarea('video', Input::post('video', isset($ayuda) ? $ayuda->video : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Descripcion', 'descripcion'); ?>

			<div class="input">
				<?php echo Form::textarea('descripcion', Input::post('descripcion', isset($ayuda) ? $ayuda->descripcion : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>