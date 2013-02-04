<?php
class Controller_Pagina extends Controller_Admin
{
    public $template = 'template_manager';

    public function before()
    {
        $this->template = Session::get('template');
        parent::before();
    }

	public function action_index()
	{
		$data['paginas'] = Model_Pagina::find('all');
		$this->template->title = "Paginas";
		$this->template->content = View::forge('pagina/index', $data);

	}

	public function action_view($id = null)
	{
		$data['pagina'] = Model_Pagina::find($id);

		is_null($id) and Response::redirect('Pagina');

		$this->template->title = "Pagina";
		$this->template->content = View::forge('pagina/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Pagina::validate('create');
			
			if ($val->run())
			{
				$seccion = Model_Pagina::forge(array(
					'descripcion' => Input::post('descripcion'),
				));

				if ($seccion and $seccion->save())
				{
					Session::set_flash('success', 'Added pagina #'.$seccion->id.'.');

					Response::redirect('pagina');
				}

				else
				{
					Session::set_flash('error', 'Could not save pagina.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Secciones";
		$this->template->content = View::forge('pagina/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Pagina');

		$seccion = Model_Pagina::find($id);

		$val = Model_Pagina::validate('edit');

		if ($val->run())
		{
			$seccion->descripcion = Input::post('descripcion');

			if ($seccion->save())
			{
				Session::set_flash('success', 'Updated pagina #' . $id);

				Response::redirect('pagina');
			}

			else
			{
				Session::set_flash('error', 'Could not update pagina #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$seccion->descripcion = $val->validated('descripcion');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('pagina', $seccion, false);
		}

		$this->template->title = "Secciones";
		$this->template->content = View::forge('pagina/edit');

	}

	public function action_delete($id = null)
	{
		if ($seccion = Model_Pagina::find($id))
		{
			$seccion->delete();

			Session::set_flash('success', 'Deleted pagina #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete pagina #'.$id);
		}

		Response::redirect('pagina');

	}


}