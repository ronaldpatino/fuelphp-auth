<h2>Editor</h2>
<br>
<?php if ($periodistas): ?>
<table class="table table-striped table-bordered table-condensed">
    <thead>
    <tr>
        <th>Periodista</th>

    </tr>
    </thead>
    <tbody>
        <?php foreach ($periodistas as $usuario): ?>
        <tr>
            <td>
                <?php echo Html::anchor('editor/revisar/'.$usuario['id'], $usuario['username']); ?>
            </td>
        </tr>
        <?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No existen periodistas con notas.</p>
<?php endif; ?>





