    <?php  echo Form::open(array('action' => 'manager/create', 'class'=>'well'));?>
    <fieldset>
        <div class="control-group">
            <label>Nombre de Usuario</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'username','type '=>'text', 'placeholder'=>'Ingrese el nombre de usuario'));?>
            </div>
        </div>
        <div class="control-group">
            <label>Password</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'password','type '=>'password', 'placeholder'=>'Ingrese el password'));?>
            </div>
        </div>

        <div class="control-group">
            <label>Confime Password </label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'password_confirm','type '=>'password', 'placeholder'=>'Confirme el password'));?>
            </div>
        </div>
        <div class="control-group">
            <label>Email</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'email','type '=>'text', 'placeholder'=>'Ingrese el email del usuario'));?>
            </div>
        </div>

        <div class="control-group">
            <label>Grupo </label>
            <div class="controls">
                <?php echo Form::select('group', 'none', array('1'=>'Periodista','50'=>'Editor','100'=>'Administrador'));?>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </fieldset>
    <?php  echo Form::close();?>

