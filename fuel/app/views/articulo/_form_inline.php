<?php echo Form::open(array('action' => 'articulo/create','class' => 'well form-inline')); ?>

	<fieldset>

            <?php echo Form::input('nombre', Input::post('nombre', isset($articulo) ? $articulo->nombre : ''), array('class' => 'input-xlarge', 'placeholder'=>'Nombre del Articulo')); ?>
    		<?php echo Form::hidden('periodista_id', $user_id); ?>
            <?php echo Form::select('seccion_id', 'none', $select_secciones);?>

			<?php echo Form::submit('submit', 'Crear Articulo', array('class' => 'btn btn-primary')); ?>


	</fieldset>
<?php echo Form::close(); ?>