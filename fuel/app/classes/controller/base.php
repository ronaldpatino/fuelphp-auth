<?php

abstract class Controller_Base extends Controller_Template {

    public function before()
    {
        parent::before();

        // Assign current_user to the instance so controllers can use it
        $user_id = Auth::instance()->get_user_id();
        $this->current_user = Auth::check() ? Model_User::find(Arr::get($user_id, 1)) : null;

        // Set a global variable so views can use it
        View::set_global('current_user', $this->current_user);
    }

}
