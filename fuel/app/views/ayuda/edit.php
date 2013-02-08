<h2>Editing Ayuda</h2>
<br>

<?php echo render('ayuda/_form'); ?>
<p>
	<?php echo Html::anchor('ayuda/view/'.$ayuda->id, 'View'); ?> |
	<?php echo Html::anchor('ayuda', 'Back'); ?></p>
