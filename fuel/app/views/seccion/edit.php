<h2>Editing Seccion</h2>
<br>

<?php echo render('seccion/_form'); ?>
<p>
	<?php echo Html::anchor('seccion/view/'.$seccion->id, 'View'); ?> |
	<?php echo Html::anchor('seccion', 'Back'); ?></p>
