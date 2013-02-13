<?php
class Controller_Ayuda extends Controller_Template 
{
    public $template = 'template_ayuda';
	public function action_index($menu_id=null)
	{

        is_null($menu_id) and Response::redirect('User/login');
        $data['ayudas'] = Model_Ayuda::find('all', array(
            'where' => array(
                array('menu', $menu_id),
            )
        ));

		switch($menu_id)
        {
            case 1:
                $data['menu'] = "Ayuda para Periodistas";
                $this->template->title = "Ayuda para Periodistas";
                $this->template->menu_id = 1;
                break;

            case 2:
                $data['menu'] = "Ayuda para Editores";
                $this->template->title = "Ayuda para Editores";
                $this->template->menu_id = 2;
                break;

            case 3:
                $data['menu'] = "Ayuda para Diagramadores";
                $this->template->title = "Ayuda para Diagramadores";
                $this->template->menu_id = 3;
                break;

            case 4:
                $data['menu'] = "Ayuda para Administradores";
                $this->template->title = "Ayuda para Administradores";
                $this->template->menu_id = 4;
                break;
            default:
                $data['menu'] = "Ayuda";
                $this->template->title = "Ayuda";
                $this->template->menu_id = null;
                break;
        }

		$this->template->content = View::forge('ayuda/aindex', $data);

	}

	public function action_view($id = null)
	{
		$data['ayuda'] = Model_Ayuda::find($id);

		is_null($id) and Response::redirect('Ayuda');

        switch($data['ayuda']->menu)
        {
            case 1:
                $data['menu'] = "Ayuda para Periodistas";
                $this->template->title = "Ayuda para Periodistas";
                $this->template->menu_id = 1;
                break;

            case 2:
                $data['menu'] = "Ayuda para Editores";
                $this->template->title = "Ayuda para Editores";
                $this->template->menu_id = 2;
                break;

            case 3:
                $data['menu'] = "Ayuda para Diagramadores";
                $this->template->title = "Ayuda para Diagramadores";
                $this->template->menu_id = 3;
                break;

            case 4:
                $data['menu'] = "Ayuda para Administradores";
                $this->template->title = "Ayuda para Administradores";
                $this->template->menu_id = 4;
                break;
            default:
                $data['menu'] = "Ayuda";
                $this->template->title = "Ayuda";
                $this->template->menu_id = null;
                break;
        }

		$this->template->title = "Ayuda";
		$this->template->content = View::forge('ayuda/view', $data, false);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Ayuda::validate('create');
			
			if ($val->run())
			{
				$ayuda = Model_Ayuda::forge(array(
					'menu' => Input::post('menu'),
					'titulo' => Input::post('titulo'),
					'video' => Input::post('video'),
					'descripcion' => Input::post('descripcion'),
				));

				if ($ayuda and $ayuda->save())
				{
					Session::set_flash('success', 'Added ayuda #'.$ayuda->id.'.');

					Response::redirect('ayuda');
				}

				else
				{
					Session::set_flash('error', 'Could not save ayuda.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Ayudas";
		$this->template->content = View::forge('ayuda/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Ayuda');

		$ayuda = Model_Ayuda::find($id);

		$val = Model_Ayuda::validate('edit');

		if ($val->run())
		{
			$ayuda->menu = Input::post('menu');
			$ayuda->titulo = Input::post('titulo');
			$ayuda->video = Input::post('video');
			$ayuda->descripcion = Input::post('descripcion');

			if ($ayuda->save())
			{
				Session::set_flash('success', 'Updated ayuda #' . $id);

				Response::redirect('ayuda');
			}

			else
			{
				Session::set_flash('error', 'Could not update ayuda #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$ayuda->menu = $val->validated('menu');
				$ayuda->titulo = $val->validated('titulo');
				$ayuda->video = $val->validated('video');
				$ayuda->descripcion = $val->validated('descripcion');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('ayuda', $ayuda, false);
		}

		$this->template->title = "Ayudas";
		$this->template->content = View::forge('ayuda/edit');

	}

	public function action_delete($id = null)
	{
		if ($ayuda = Model_Ayuda::find($id))
		{
			$ayuda->delete();

			Session::set_flash('success', 'Deleted ayuda #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete ayuda #'.$id);
		}

		Response::redirect('ayuda');

	}


}