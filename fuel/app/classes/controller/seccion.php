<?php
class Controller_Seccion extends Controller_Template 
{

	public function action_index()
	{
		$data['seccions'] = Model_Seccion::find('all');
		$this->template->title = "Seccions";
		$this->template->content = View::forge('seccion/index', $data);

	}

	public function action_view($id = null)
	{
		$data['seccion'] = Model_Seccion::find($id);

		is_null($id) and Response::redirect('Seccion');

		$this->template->title = "Seccion";
		$this->template->content = View::forge('seccion/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Seccion::validate('create');
			
			if ($val->run())
			{
				$seccion = Model_Seccion::forge(array(
					'descripcion' => Input::post('descripcion'),
				));

				if ($seccion and $seccion->save())
				{
					Session::set_flash('success', 'Added seccion #'.$seccion->id.'.');

					Response::redirect('seccion');
				}

				else
				{
					Session::set_flash('error', 'Could not save seccion.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Seccions";
		$this->template->content = View::forge('seccion/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Seccion');

		$seccion = Model_Seccion::find($id);

		$val = Model_Seccion::validate('edit');

		if ($val->run())
		{
			$seccion->descripcion = Input::post('descripcion');

			if ($seccion->save())
			{
				Session::set_flash('success', 'Updated seccion #' . $id);

				Response::redirect('seccion');
			}

			else
			{
				Session::set_flash('error', 'Could not update seccion #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$seccion->descripcion = $val->validated('descripcion');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('seccion', $seccion, false);
		}

		$this->template->title = "Seccions";
		$this->template->content = View::forge('seccion/edit');

	}

	public function action_delete($id = null)
	{
		if ($seccion = Model_Seccion::find($id))
		{
			$seccion->delete();

			Session::set_flash('success', 'Deleted seccion #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete seccion #'.$id);
		}

		Response::redirect('seccion');

	}


}