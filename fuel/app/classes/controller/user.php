<?php

class Controller_User extends Controller_Template
{

	public function action_login()
	{
        if(Auth::check())
        {
            Response::redirect('welcome'); // user already logged in
        }


        $val = Validation::forge('my_validation');
        $val->add_field('username', 'Your username', 'required');
        $val->add_field('password', 'Your password', 'required|min_length[3]|max_length[10]');

        if ($val->run())
        {
            $auth = Auth::instance();
            if($auth->login($val->validated('username'), $val->validated('password')))
            {
                Session::set_flash('notice', 'FLASH: logged in');
                Response::redirect('welcome');
            }
            else
            {
                $data['username'] = $val->validated('username');
                $data['errors'] = 'Wrong username/password. Try again';
            }
        }

        $data['errors'] = null;
        $this->template->title = 'Login';
        $this->template->errors = $data['errors'];
        $this->template->content = View::forge('user/login', $data);
	}

    public function action_logout()
    {
        Auth::instance()->logout();
        Response::redirect('user/login');
    }

}
