<h2>Viewing #<?php echo $foto->id; ?></h2>

<p>
	<strong>Imagen:</strong>
	<?php echo $foto->imagen; ?></p>
<p>
	<strong>Width:</strong>
	<?php echo $foto->width; ?></p>
<p>
	<strong>Height:</strong>
	<?php echo $foto->height; ?></p>
<p>
	<strong>Articulo id:</strong>
	<?php echo $foto->articulo_id; ?></p>
<p>
	<strong>Dimension id:</strong>
	<?php echo $foto->dimension_id; ?></p>
<p>
	<strong>Estado:</strong>
	<?php echo $foto->estado; ?></p>

<?php echo Html::anchor('foto/edit/'.$foto->id, 'Edit'); ?> |
<?php echo Html::anchor('foto', 'Back'); ?>