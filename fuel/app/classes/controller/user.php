<?php

class Controller_User extends Controller_Template
{

	public function action_login()
	{

        $val = Validation::forge('my_validation');
        $val->add_field('username', 'Your username', 'required');
        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[10]');

        if ($val->run())
        {
            // Authenticate user
            if (Auth::instance()->login($val->validated('username'),
                $val->validated('password')))
            {
                Response::redirect('articulo');
            }
            else
            {
                Session::set_flash('error', 'Incorrect username or password.'.
                    ' Please try again.');

                Response::redirect('user/login');
            }
        }

        $this->template->title = 'Login';
        $this->template->content = View::forge('user/login')->set('val', $val, false);
	}

    public function action_logout()
    {
        Auth::instance()->logout();
        Response::redirect('user/login');
    }

    public function action_estaactivo()
    {
        $this->template = '';
        if (Auth::check())
        {
            $user_id = Auth::instance()->get_user_id();
            $user_id = $user_id[1];
            $usuario = Auth::instance()->get_screen_name();
            $respuesta = array('user_id'=>$user_id, 'usuario'=>$usuario);
        }
        else
        {
            $respuesta = array('user_id'=>0, 'usuario'=>'No logeado');
        }
        $respuesta =  Format::forge($respuesta)->to_json();
        echo $respuesta;
    }
}
