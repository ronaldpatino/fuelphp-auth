<h2>Editing Foto</h2>
<br>

<?php echo render('foto/_form'); ?>
<p>
	<?php echo Html::anchor('foto/view/'.$foto->id, 'View'); ?> |
	<?php echo Html::anchor('foto', 'Back'); ?></p>
