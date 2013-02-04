<h2>Listado de P&aacute;ginas</h2>
<br>
<?php if ($paginas): ?>
<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>Descripcion</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($paginas as $pagina): ?>		<tr>

			<td><?php echo $pagina->descripcion; ?></td>
			<td>
				<?php echo Html::anchor('pagina/edit/'.$pagina->id, 'Editar'); ?> |
				<?php echo Html::anchor('pagina/delete/'.$pagina->id, 'Borrar', array('onclick' => "return confirm('Esta seguro?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No existen P&aacute;ginas creadas.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('pagina/create', 'Crear nueva P&aacute;gina', array('class' => 'btn success')); ?>

</p>
