<?php

abstract class Controller_Admin extends Controller_Base {

   // public $template = 'admin/template';

    public function before()
    {
        parent::before();

        if ( ! Auth::member(100) and Request::active()->action != 'login')
        {
            Response::redirect('user/login');
        }
    }

    // ....

}