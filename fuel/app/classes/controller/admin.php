<?php

class Controller_Admin extends Controller_Template {

    public function before()
    {
        parent::before();

        if(\Auth::check())
        {
            $access = Auth::has_access(\Request::active()->controller . "." . \Request::active()->action);
            if ($access)
            {
                $this->user_id = Auth::instance()->get_user_id();
                $this->user_id = $this->user_id[1];
                View::set_global('usuario', Auth::instance()->get_screen_name());
            }
            else
            {

                Response::redirect('welcome/404');
            }
        }
        else
        {
            Response::redirect('user/login');
        }

    }

    public function action_404()
    {
        $messages = array('
			Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?'
        );

        $data['title'] = $messages[array_rand($messages)];

        // Set a HTTP 404 output header
        $this->response->status = 404;
        $this->template->content = View::factory('common/404', $data);
    }
}

/* End of file common.php */