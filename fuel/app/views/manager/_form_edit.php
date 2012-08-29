    <?php  echo Form::open(array('class'=>'well'));?>
    <fieldset>
        <div class="control-group">
            <label>Nombre de Usuario</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'username','type '=>'text', 'value'=>$user->username,'readonly'=>'readonly'));?>
            </div>
        </div>
        <div class="control-group">
            <label>Nuevo Password</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'password','type '=>'password', 'placeholder'=>'Ingrese el nuevo password'));?>
            </div>
        </div>

        <div class="control-group">
            <label>Confime Password </label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'password_confirm','type '=>'password', 'placeholder'=>'Confirme el nuevo password'));?>
            </div>
        </div>
        <div class="control-group">
            <label>Email</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'email','type '=>'text', 'value'=>$user->email, 'placeholder'=>'Ingrese el email del usuario'));?>
            </div>
        </div>

        <div class="control-group">
            <label>Grupo </label>
            <div class="controls">
                <?php echo Form::select('group', $user->group, array('1'=>'Periodista', '25'=>'Diagramador', '50'=>'Editor','100'=>'Administrador'));?>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Modificar Usuario</button>
            <?php echo Html::anchor('manager', 'Cancelar', array('id' => 'a1', 'class' => 'btn'));?>
        </div>
    </fieldset>
    <?php  echo Form::close();?>

