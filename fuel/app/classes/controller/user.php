<?php

class Controller_User extends Controller_Template
{

	public function action_login()
	{
        if(\Auth::check())
        {

            if (Auth::instance()->has_access('Controller_Manager.index'))
            {
                Session::set('template', 'template_manager');
                Response::redirect('manager');
            }
            elseif (Auth::instance()->has_access('Controller_Editor.index'))
            {
                Session::set('template', 'template_editor');
                Response::redirect('editor');
            }
            elseif (Auth::instance()->has_access('Controller_Diagramador.index'))
            {
                Session::set('template', 'template_diagramador');
                Response::redirect('diagramador');
            }
            else
            {
                Session::set('template', 'template_gallery');
                Response::redirect('articulo');
            }

        }


        $val = Validation::forge('my_validation');
        $val->add_field('username', 'Su nombre de usuario', 'required');
        $val->add_field('password', 'Su password', 'required|min_length[3]|max_length[10]');

        if ($val->run())
        {
            // Authenticate user
            if (Auth::instance()->login($val->validated('username'), $val->validated('password')))
            {
                if (Auth::instance()->has_access('Controller_Manager.index'))
                {
                    Session::set('template', 'template_manager');
                    Response::redirect('manager');
                }
                elseif (Auth::instance()->has_access('Controller_Editor.index'))
                {
                    Session::set('template', 'template_editor');
                    Response::redirect('editor');
                }
                elseif (Auth::instance()->has_access('Controller_Diagramador.index'))
                {
                    Session::set('template', 'template_diagramador');
                    Response::redirect('diagramador');
                }
                else
                {
                    Session::set('template', 'template_gallery');
                    Response::redirect('articulo');
                }

            }
            else
            {
                Session::set_flash('error', 'Usuario o passworod incorrectos.' . ' Intente nuevamente.');

                Response::redirect('user/login');
            }
        }

        $this->template->title = 'Login';
        $this->template->content = View::forge('user/login')->set('val', $val, false);
	}

    public function action_logout()
    {
        Auth::instance()->logout();
        Session::destroy();
        Response::redirect('user/login');
    }

}
