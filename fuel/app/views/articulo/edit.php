<h2>Editing Articulo</h2>
<br>

<?php echo render('articulo/_form'); ?>
<p>
	<?php echo Html::anchor('articulo/view/'.$articulo->id, 'View'); ?> |
	<?php echo Html::anchor('articulo', 'Back'); ?></p>
