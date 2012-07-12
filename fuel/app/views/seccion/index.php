<h2>Listing Seccions</h2>
<br>
<?php if ($seccions): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Descripcion</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($seccions as $seccion): ?>		<tr>

			<td><?php echo $seccion->descripcion; ?></td>
			<td>
				<?php echo Html::anchor('seccion/view/'.$seccion->id, 'View'); ?> |
				<?php echo Html::anchor('seccion/edit/'.$seccion->id, 'Edit'); ?> |
				<?php echo Html::anchor('seccion/delete/'.$seccion->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Seccions.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('seccion/create', 'Add new Seccion', array('class' => 'btn success')); ?>

</p>
