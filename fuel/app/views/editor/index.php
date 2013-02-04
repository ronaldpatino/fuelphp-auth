<h2>Editor</h2>
<br>

<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#home" data-toggle="tab">Cronistas Asignados</a></li>
    <li><a href="#profile" data-toggle="tab">Otros Cronistas</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="home">
        <?php if ($periodistas): ?>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>Cronista</th>

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
    </div>

    <div class="tab-pane" id="profile">
        <?php if ($periodistas_otros): ?>
        <table class="table table-striped table-bordered table-condensed">
            <thead>
            <tr>
                <th>Cronista</th>

            </tr>
            </thead>
            <tbody>
                <?php foreach ($periodistas_otros as $usuario_otros): ?>
            <tr>
                <td>
                    <?php echo Html::anchor('editor/revisar/'.$usuario_otros['id'], $usuario_otros['username']); ?>
                </td>
            </tr>
                <?php endforeach; ?>	</tbody>
        </table>

        <?php else: ?>
        <p>No existen otros periodistas con notas.</p>
        <?php endif; ?>

    </div>

</div>
