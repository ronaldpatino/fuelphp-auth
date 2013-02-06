<h2>Editar Usuario</h2>
<br>

<?php if($user->group != 100):?>
<?php echo render('manager/_form_edit'); ?>
<?php else:?>
<?php echo render('manager/_form_edit_admin'); ?>
<?php endif;?>

<p><?php echo Html::anchor('manager', 'Regresar'); ?></p>

<script type="text/javascript" >
    $(document).ready(function() {

        <?php if($user->padre != 0):?>
            get_editor();
        <?php endif;?>
        $('#form_group').change(function() {
            var group = $('#form_group').find(":selected").val();
            if (group == 50)
            {
                $('#form_padre').empty();
                $('#form_padre').html('<option value="0">Editor</option>');
            }
            else if (group == 100)
            {
                $('#form_padre').empty();
                $('#form_padre').html('<option value="0">Administrador</option>');
            }
            else
            {
                get_editor();
            }


        });

        $('#form_empresa').change(function() {
            var group = $('#form_group').find(":selected").val();
            if (group == 50)
            {
                $('#form_padre').empty();
                $('#form_padre').html('<option value="0">Editor</option>');
            }
            else if (group == 100)
            {
                $('#form_padre').empty();
                $('#form_padre').html('<option value="0">Administrador</option>');
            }
            else
            {
                get_editor();
            }
        });

        function get_editor(empresa)
        {
            var empresa = $('#form_empresa').find(":selected").val();
            $.getJSON('/gr/api/editores/'+empresa, function(data) {
                var items = '';

                $.each(data['select_editores'], function(key, val) {
                    items +='<option  value="' + key +'">' + val + '</option>';
                });

                $('#form_padre').empty();
                $('#form_padre').html(items);
            });
        }
    });
</script>