
<?php echo isset($errors) ? $errors : false; ?>
<?php echo Form::open('user/login'); ?>

<div class="input text required">
    <?php echo Form::label('Username', 'username'); ?>
    <?php echo Form::input('username', isset($username) ? $username : false, array('size' => 30)); ?>
</div>

<div class="input password required">
    <?php echo Form::label('Password', 'password'); ?>
    <?php echo Form::password('password', NULL, array('size' => 30)); ?>
</div>
 
<div class="input submit">
<?php echo Form::submit('login', 'Login'); ?>
</div>
