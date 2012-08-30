<h2>Listado de Secciones</h2>
<br>
<?php if ($seccions): ?>
<table class="table table-striped table-bordered table-condensed">
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
				<?php echo Html::anchor('seccion/edit/'.$seccion->id, 'Editar'); ?> |
				<?php echo Html::anchor('seccion/delete/'.$seccion->id, 'Borrar', array('onclick' => "return confirm('Esta seguro?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No existen Secciones creadas.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('seccion/create', 'Crear nueva Seccion', array('class' => 'btn success')); ?>

</p>
