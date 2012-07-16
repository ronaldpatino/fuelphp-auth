<?php

class Controller_Manager extends Controller_Admin
{
    public $template = 'template_manager';

    public function action_index()
    {
        $data['usuarios'] = Model_User::find('all');
        $this->template->title = 'Administrador';
        $this->template->content = View::forge('manager/index', $data);
    }


    public function action_create()
    {
        if (Input::method() == 'POST')
        {
            $val = Validation::forge('createuser');
            $val->add_field('username', 'Usuario', 'required');
            $val->add_field('password', 'Password', 'required|min_length[8]|max_length[10]');
            $val->add_field('password_confirm', 'Confime Password ', 'required|match_field[password]');
            $val->add_field('email', 'Email', 'required|valid_email');


            if ($val->run())
            {

                try
                {
                    $user = Auth::instance()->create_user(Input::post('username'), Input::post('password'), Input::post('email'), Input::post('group'),array());
                    Session::set_flash('success', 'Usuario ' . Input::post('username') . 'creado correctamente' );
                    Response::redirect('manager');

                }
                catch (\SimpleUserUpdateException $e)
                {
                        Session::set_flash('error', $e->getMessage());
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Crear Usuario";
        $this->template->content = View::forge('manager/create');


    }
}
