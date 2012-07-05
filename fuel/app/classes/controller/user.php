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

}
