
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

</fieldset>
<?php  echo Form::close();?>
<?php echo Html::anchor('manager', 'Regresar a Usuarios'); ?>

