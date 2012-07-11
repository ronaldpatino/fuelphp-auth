<h2>Viewing #<?php echo $dimension->id; ?></h2>

<p>
	<strong>Descipcion:</strong>
	<?php echo $dimension->descipcion; ?></p>

<?php echo Html::anchor('dimension/edit/'.$dimension->id, 'Edit'); ?> |
<?php echo Html::anchor('dimension', 'Back'); ?>