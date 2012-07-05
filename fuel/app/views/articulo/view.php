<h2>Viewing #<?php echo $articulo->id; ?></h2>

<p>
	<strong>Nombre:</strong>
	<?php echo $articulo->nombre; ?></p>
<p>
	<strong>Periodista id:</strong>
	<?php echo $articulo->periodista_id; ?></p>
<p>
	<strong>Seccion id:</strong>
	<?php echo $articulo->seccion_id; ?></p>

<?php echo Html::anchor('articulo/edit/'.$articulo->id, 'Edit'); ?> |
<?php echo Html::anchor('articulo', 'Back'); ?>