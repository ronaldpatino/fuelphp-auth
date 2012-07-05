<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Imagen', 'imagen'); ?>

			<div class="input">
				<?php echo Form::textarea('imagen', Input::post('imagen', isset($foto) ? $foto->imagen : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Width', 'width'); ?>

			<div class="input">
				<?php echo Form::input('width', Input::post('width', isset($foto) ? $foto->width : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Height', 'height'); ?>

			<div class="input">
				<?php echo Form::input('height', Input::post('height', isset($foto) ? $foto->height : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Articulo id', 'articulo_id'); ?>

			<div class="input">
				<?php echo Form::input('articulo_id', Input::post('articulo_id', isset($foto) ? $foto->articulo_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Dimension id', 'dimension_id'); ?>

			<div class="input">
				<?php echo Form::input('dimension_id', Input::post('dimension_id', isset($foto) ? $foto->dimension_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Estado', 'estado'); ?>

			<div class="input">
				<?php echo Form::input('estado', Input::post('estado', isset($foto) ? $foto->estado : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>