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
					if ($user)
					{
						$usuario = Model_User::find($user);										
						$usuario->padre = Input::post('padre');
						$usuario->empresa = Input::post('empresa');
						$usuario->save();
					}

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

		$editores = Model_User::find('all',
				array(
                'where' =>
                array(
                    array('group', '=', 50),
					array('padre', '=', 0),
                    array('empresa', 'like', 'mercurio')
                )
            ));
		
		$select_editores = array();
		
		foreach($editores as $e)
		{
			$select_editores[$e->id] = $e->username;
		}
		$data['select_editores'] = $select_editores;
		
        $this->template->title = "Crear Usuario";
        $this->template->content = View::forge('manager/create', $data);


    }

    public function action_delete($id = null)
    {
        if ($user = Model_User::find($id))
        {
            
			$usuario_nombre = $user->username;
			
			if ($this->tiene_hijos($user->id))
			{
				Session::set_flash('error', 'El Usuario '.$usuario_nombre . ' tiene periodistas a su cargo, NO puede ser borrado');
			}
			else
			{
				$user->delete();
				Session::set_flash('success', 'Usuario '.$usuario_nombre . ' borrado del sistema');			
			}            
        }

        else
        {
            Session::set_flash('error', 'No se pudo borrar el usuario');
        }

        Response::redirect('manager');

    }

    public function action_view($id = null)
    {
        is_null($id) and Response::redirect('manager');
        $data['usuario'] = Model_User::find($id);

        switch ($data['usuario']->group)
        {

            case 1:
                $data['seccion'] = 'Periodista';
                break;
            case 50:
                $data['seccion'] = 'Editor';
                break;

            case 100:
                $data['seccion'] = 'Administrador';
                break;
        }


        $this->template->title = "Ver Usuario";
        $this->template->content = View::forge('manager/view', $data);

    }

    public function action_edit($id = null)
    {
        is_null($id) and Response::redirect('manager');

        $user =  Model_User::find($id);

        $val = Validation::forge('edituser');
        $val->add_field('password', 'Password', 'min_length[8]|max_length[10]');
        $val->add_field('password_confirm', 'Confime Password ', 'match_field[password]');
        $val->add_field('email', 'Email', 'required|valid_email');

        if ($val->run())
        {
            try
            {

                if ($this->tiene_hijos($user->id) && Input::post('group') != $user->group)
                {
                    Session::set_flash('error', 'El Usuario '.$user->username . ' tiene periodistas a su cargo, NO puede ser cambiado de grupo');
                }
                else
                {

                    $ipassword = Input::post('password');
                    if (!empty($ipassword))
                    {
                        Auth::instance()->cambiar_password(Input::post('username'), Input::post('password'));
                    }

                    Auth::instance()->update_user(array('email'=>Input::post('email'),'group'=>Input::post('group')),Input::post('username'));
                    Session::set_flash('success', 'Usuario ' . Input::post('username') . ' modificado correctamente' );

                }

                Response::redirect('manager');

            }
            catch (\SimpleUserUpdateException $e)
            {
                
				Session::set_flash('error', $e->getMessage());
            }
        }
        else
        {
            if (Input::method() == 'POST')
            {
                //$user->password = $val->validated('password');
                //$user->email = $val->validated('email');

                Session::set_flash('error', $val->error());
            }

            $this->template->set_global('user', $user, false);
        }

        $this->template->title = "Usuario";
        $this->template->content = View::forge('manager/edit');


    }
	
	private function tiene_hijos($id)
	{
		$hijos = Model_User::find('all',
				array(
                'where' =>
                array(                    
					array('padre', '=', $id)
                )
            ));
		
		if ($hijos)
		{
			return 1;
		}
		return 0;
	}
}
