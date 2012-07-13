<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ba01000660
 * Date: 13/07/12
 * Time: 11:18 AM
 * To change this template use File | Settings | File Templates.
 */
class Controller_Profile extends Controller_Admin
{
    public function action_index()
    {
        $data['usuario'] = Auth::instance()->get_screen_name();
        $this->template->title = 'Perfil de usuario';
        $this->template->content = View::forge('profile/index', $data);
    }


    public function action_changepassword()
    {
        $val = Validation::forge('changepassword');
        $val->add_field('password', 'Password Actual', 'required');
        $val->add_field('password_nuevo', 'Password Nuevo', 'required|min_length[8]|max_length[10]|not_match_field[password]');
        $val->add_field('password_nuevo_confirm', 'Confime Password Nuevo', 'required|min_length[8]|max_length[10]|match_field[password_nuevo]');

        if ($val->run())
        {
            if (Auth::instance()->change_password(Input::post('password'),Input::post('password_nuevo')))
            {
                Session::set_flash('success', 'Password actualizado correctamente');
            }
            else
            {
                Session::set_flash('error', 'Error al cambiar el Password');
            }
        }
        else
        {
            Session::set_flash('error', $val->error());
        }


        Response::redirect('profile');

    }

}
