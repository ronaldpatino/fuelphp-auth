

<h2><?php echo $menu?></h2>

<?php if ($ayudas): ?>
<table class="zebra-striped">
	<tbody>
<?php foreach ($ayudas as $ayuda): ?>		<tr>
			<td>
				<?php echo Html::anchor('ayuda/view/'.$ayuda->id, $ayuda->titulo ); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Ayudas.</p>

<?php endif; ?>
