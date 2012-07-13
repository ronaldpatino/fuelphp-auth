<div class="span6">
    <h3>Cambio de Password</h3>
    <p>Para cambiar su password use el formulario siguiente.</p>

    <?php  echo Form::open(array('action' => 'profile/changepassword', 'class'=>'well'));?>
        <fieldset>
            <div class="control-group">
                <label>Password Actual</label>
                <div class="controls">
                    <?php echo Form::input(array('class' => 'span3', 'name'=>'password','type '=>'password', 'placeholder'=>'Ingrese su password actual'));?>
                </div>
            </div>
            <div class="control-group">
                <label>Password Nuevo</label>
                <div class="controls">
                    <?php echo Form::input(array('class' => 'span3', 'name'=>'password_nuevo','type '=>'password', 'placeholder'=>'Ingrese el nuevo password'));?>
                </div>
            </div>

            <div class="control-group">
                <label>Confime Password Nuevo</label>
                <div class="controls">
                    <?php echo Form::input(array('class' => 'span3', 'name'=>'password_nuevo_confirm','type '=>'password', 'placeholder'=>'Ingrese el nuevo password'));?>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Cambiar Password</button>
            </div>
        </fieldset>
    <?php  echo Form::close();?>
</div>