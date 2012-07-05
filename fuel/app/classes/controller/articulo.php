<?php
class Controller_Articulo extends Controller_Admin
{
	public function action_index()
	{

        $data['articulos'] = Model_Articulo::find('all', array('related' => array('fotos')));
		/*
        $this->template->title = "Articulos";
		$this->template->content = View::forge('articulo/index', $data);
		*/

        $view = View::forge('template');
        $view->set_global('user_id', $this->user_id);
        $view->set_global('data', $data);
        $view->set_global('title', 'Articulos');
        $view->content = View::forge('articulo/index',$data);
        return $view;

	}

	public function action_view($id = null)
	{
		$data['articulo'] = Model_Articulo::find($id);

		is_null($id) and Response::redirect('Articulo');

		$this->template->title = "Articulo";
		$this->template->content = View::forge('articulo/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Articulo::validate('create');
			
			if ($val->run())
			{
				$articulo = Model_Articulo::forge(array(
					'nombre' => Input::post('nombre'),
					'periodista_id' => Input::post('periodista_id'),
					'seccion_id' => Input::post('seccion_id'),
				));

				if ($articulo and $articulo->save())
				{
					Session::set_flash('success', 'Added articulo #'.$articulo->id.'.');

					Response::redirect('articulo');
				}

				else
				{
					Session::set_flash('error', 'Could not save articulo.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Articulos";
		$this->template->content = View::forge('articulo/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Articulo');

		$articulo = Model_Articulo::find($id);

		$val = Model_Articulo::validate('edit');

		if ($val->run())
		{
			$articulo->nombre = Input::post('nombre');
			$articulo->periodista_id = Input::post('periodista_id');
			$articulo->seccion_id = Input::post('seccion_id');

			if ($articulo->save())
			{
				Session::set_flash('success', 'Updated articulo #' . $id);

				Response::redirect('articulo');
			}

			else
			{
				Session::set_flash('error', 'Could not update articulo #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$articulo->nombre = $val->validated('nombre');
				$articulo->periodista_id = $val->validated('periodista_id');
				$articulo->seccion_id = $val->validated('seccion_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('articulo', $articulo, false);
		}

		$this->template->title = "Articulos";
		$this->template->content = View::forge('articulo/edit');

	}

	public function action_delete($id = null)
	{
		if ($articulo = Model_Articulo::find($id))
		{
			$articulo->delete();

			Session::set_flash('success', 'Deleted articulo #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete articulo #'.$id);
		}

		Response::redirect('articulo');

	}


}