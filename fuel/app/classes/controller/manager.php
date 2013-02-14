<?php

class Controller_Manager extends Controller_Admin
{
    public $template = 'template_manager';

    public function action_index()
    {
        $data['usuarios'] = Model_User::find('all',array('order_by' => array('group' => 'desc')));
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
                    $user = Auth::instance()->create_user(Input::post('username'), Input::post('password'), Input::post('email'), Input::post('group'),array('acceso_web'=>Input::post('acceso_web')));
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


		$data['select_editores'] = $this->get_editores(array('mercurio'));
		
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
        $data['padre'] = Model_User::find($data['usuario']->padre);
        $data['hijos'] = Model_User::find('all', array(
                                                            'where' =>
                                                            array(
                                                                array('padre', '=', $data['usuario']->id)
                                                            )
                                                        ));
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

                    Auth::instance()->update_user(array('email'=>Input::post('email'),'group'=>Input::post('group'),'padre'=>Input::post('padre'),'acceso_web'=>Input::post('acceso_web')),Input::post('username'));
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

            $profile_fields = $this->get_profile_fields($user)?$this->get_profile_fields($user):null;

            if ($profile_fields['acceso_web'] == 1)
            {
                $acceso_web['si'] = Form::radio('acceso_web', '1', true);
                $acceso_web['no'] = Form::radio('acceso_web', '0');
            }
            else
            {
                $acceso_web['si'] = Form::radio('acceso_web', '1');
                $acceso_web['no'] = Form::radio('acceso_web', '0', true);
            }

            $this->template->set_global('acceso_web', $acceso_web, false);
            $this->template->set_global('select_editores', array('0'=>'Editor'), false);

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

    private function get_editores($empresa=null)
    {

        $editores =

            ($empresa) ?
            Model_User::find('all',
                array(
                    'where' =>
                    array(
                        array('group', '=', 50),
                        array('padre', '=', 0),
                        array('empresa', 'like', $empresa)
                    )
            ))
            :
            Model_User::find('all',
                array(
                    'where' =>
                    array(
                        array('group', '=', 50),
                        array('padre', '=', 0)
                    )
                ))
            ;

        $select_editores = array();


        foreach($editores as $e)
        {
            $select_editores[$e->id] = $e->username;
        }

        return $select_editores;
    }

    private function get_profile_fields($user)
    {
        if (is_null($user))
        {
            return false;
        }

        if (isset($user['profile_fields']))
        {
            is_array($user['profile_fields']) or $user['profile_fields'] = @unserialize($user['profile_fields']);
        }
        else
        {
            $user['profile_fields'] = array();
        }

        return $user['profile_fields'];
    }

}
