
<?php  echo Form::open(array('action' => '', 'class'=>'well'));?>
<fieldset>
    <div class="control-group">
        <label>Nombre de Usuario</label>
        <div class="controls">
            <?php echo Form::input(array('class' => 'span3', 'name'=>'username','type '=>'text', 'value' =>$usuario['username'],'readonly'=>'readonly'));?>
        </div>
    </div>

    <div class="control-group">
        <label>Email</label>
        <div class="controls">
            <?php echo Form::input(array('class' => 'span3', 'name'=>'email','type '=>'text', 'value'=>$usuario['email'], 'readonly'=>'readonly'));?>
        </div>
    </div>

    <div class="control-group">
        <label>Grupo </label>
        <div class="controls">
            <?php echo Form::input(array('class' => 'span3', 'name'=>'email','type '=>'text', 'value'=>$seccion, 'readonly'=>'readonly'));?>
        </div>
    </div>

    <?php if ($padre):?>
    <div class="control-group">
        <label>Editor </label>
        <div class="controls">
            <?php echo Form::input(array('class' => 'span3', 'name'=>'email','type '=>'text', 'value'=>$padre->username, 'readonly'=>'readonly'));?>
        </div>
    </div>
    <?php endif;?>

    <?php if ($hijos):?>
    <div class="control-group">
        <label>Cronistas a cargo </label>
        <div class="controls">
            <ul>
                <?php foreach($hijos as $hijo):?>
                    <li>
                        <?php echo Html::anchor('manager/edit/' . $hijo->id, $hijo->username); ?>
                    </li>
                <?php endforeach?>
            </ul>
        </div>
    </div>
    <?php endif?>

</fieldset>
<?php  echo Form::close();?>
<?php echo Html::anchor('manager', 'Regresar a Usuarios'); ?>

