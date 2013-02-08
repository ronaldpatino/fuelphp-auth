<h2>Listing Ayudas</h2>
<br>
<?php if ($ayudas): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Menu</th>
			<th>Titulo</th>
			<th>Video</th>
			<th>Descripcion</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($ayudas as $ayuda): ?>		<tr>

			<td><?php echo $ayuda->menu; ?></td>
			<td><?php echo $ayuda->titulo; ?></td>
			<td><?php echo $ayuda->video; ?></td>
			<td><?php echo $ayuda->descripcion; ?></td>
			<td>
				<?php echo Html::anchor('ayuda/view/'.$ayuda->id, 'View'); ?> |
				<?php echo Html::anchor('ayuda/edit/'.$ayuda->id, 'Edit'); ?> |
				<?php echo Html::anchor('ayuda/delete/'.$ayuda->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Ayudas.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('ayuda/create', 'Add new Ayuda', array('class' => 'btn success')); ?>

</p>
