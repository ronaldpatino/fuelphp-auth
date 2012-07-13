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
        $data = array();
        $this->template->title = 'Perfil de usuario';
        $this->template->content = View::forge('profile/index', $data);
    }


    public function action_changepassword()
    {

    }

}
