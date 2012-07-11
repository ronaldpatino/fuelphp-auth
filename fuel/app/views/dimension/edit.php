<h2>Editing Dimension</h2>
<br>

<?php echo render('dimension/_form'); ?>
<p>
	<?php echo Html::anchor('dimension/view/'.$dimension->id, 'View'); ?> |
	<?php echo Html::anchor('dimension', 'Back'); ?></p>
