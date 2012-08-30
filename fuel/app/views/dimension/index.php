<h2>Listado de  Dimensiones</h2>
<br>
<?php if ($dimensions): ?>
<table class="table table-striped table-bordered table-condensed">
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
				<?php echo Html::anchor('dimension/edit/'.$dimension->id, 'Editar'); ?> |
				<?php echo Html::anchor('dimension/delete/'.$dimension->id, 'Borrar', array('onclick' => "return confirm('Esta seguro?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No existen Dimensiones Definidas.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('dimension/create', 'Crear nueva Dimension', array('class' => 'btn success')); ?>

</p>
