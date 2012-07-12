<h2>Viewing #<?php echo $seccion->id; ?></h2>

<p>
	<strong>Descripcion:</strong>
	<?php echo $seccion->descripcion; ?></p>

<?php echo Html::anchor('seccion/edit/'.$seccion->id, 'Edit'); ?> |
<?php echo Html::anchor('seccion', 'Back'); ?>