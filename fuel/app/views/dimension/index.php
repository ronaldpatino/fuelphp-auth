<h2>Listing Dimensions</h2>
<br>
<?php if ($dimensions): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Descipcion</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($dimensions as $dimension): ?>		<tr>

			<td><?php echo $dimension->descipcion; ?></td>
			<td>
				<?php echo Html::anchor('dimension/view/'.$dimension->id, 'View'); ?> |
				<?php echo Html::anchor('dimension/edit/'.$dimension->id, 'Edit'); ?> |
				<?php echo Html::anchor('dimension/delete/'.$dimension->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Dimensions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('dimension/create', 'Add new Dimension', array('class' => 'btn success')); ?>

</p>
