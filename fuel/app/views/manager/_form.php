    <?php  echo Form::open(array('action' => 'manager/create', 'class'=>'well'));?>
    <fieldset>
        <div class="control-group">
            <label>Nombre de Usuario</label>
            <div class="controls">
                <?php echo Form::input(array('class' => 'span3', 'name'=>'username','type '=>'text', 'value'=>Input::post('username')?Input::post('username'):'','placeholder'=>'Ingrese el nombre de usuario'));?>
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
                <?php echo Form::input(array('class' => 'span3', 'name'=>'email','type '=>'text', 'value'=>Input::post('email')?Input::post('email'):'', 'placeholder'=>'Ingrese el email del usuario'));?>
            </div>
        </div>

        <div class="control-group">
            <label>Grupo </label>
            <div class="controls">
                <?php echo Form::select('group', 'none', array('1'=>'Periodista','25'=>'Diagramador','50'=>'Editor','100'=>'Administrador'));?>
            </div>
        </div>

        <div class="control-group"  style="display:none;">
            <label>Diario </label>
            <div class="controls">
                <?php echo Form::select('empresa', 'none', array('mercurio'=>'El Mercurio'));?>
            </div>
        </div>

        <div class="control-group">
            <label>Editor Gr&aacute;fico Responsable </label>
            <div class="controls">
                <?php echo Form::select('padre', 'none', $select_editores);?>
            </div>
        </div>

        <div class="control-group">
            <label>Puede descargar im&aacute;genes para web</label>
            <div class="controls">
                <?php echo Form::label('SI', 'acceso_web',array('style'=>'display:inline;'));?>
                <?php echo Form::radio('acceso_web', '1', false);?>
                &nbsp;
                <?php echo Form::label('NO', 'acceso_web',array('style'=>'display:inline;'));?>
                <?php echo Form::radio('acceso_web', '0', true);?>
            </div>
        </div>
		
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </fieldset>
    <?php  echo Form::close();?>
	
