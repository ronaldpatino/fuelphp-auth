<?php
class Controller_Dimension extends Controller_Template 
{

	public function action_index()
	{
		$data['dimensions'] = Model_Dimension::find('all');
		$this->template->title = "Dimensions";
		$this->template->content = View::forge('dimension/index', $data);

	}

	public function action_view($id = null)
	{
		$data['dimension'] = Model_Dimension::find($id);

		is_null($id) and Response::redirect('Dimension');

		$this->template->title = "Dimension";
		$this->template->content = View::forge('dimension/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Dimension::validate('create');
			
			if ($val->run())
			{
				$dimension = Model_Dimension::forge(array(
					'descipcion' => Input::post('descipcion'),
				));

				if ($dimension and $dimension->save())
				{
					Session::set_flash('success', 'Added dimension #'.$dimension->id.'.');

					Response::redirect('dimension');
				}

				else
				{
					Session::set_flash('error', 'Could not save dimension.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Dimensions";
		$this->template->content = View::forge('dimension/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Dimension');

		$dimension = Model_Dimension::find($id);

		$val = Model_Dimension::validate('edit');

		if ($val->run())
		{
			$dimension->descipcion = Input::post('descipcion');

			if ($dimension->save())
			{
				Session::set_flash('success', 'Updated dimension #' . $id);

				Response::redirect('dimension');
			}

			else
			{
				Session::set_flash('error', 'Could not update dimension #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$dimension->descipcion = $val->validated('descipcion');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('dimension', $dimension, false);
		}

		$this->template->title = "Dimensions";
		$this->template->content = View::forge('dimension/edit');

	}

	public function action_delete($id = null)
	{
		if ($dimension = Model_Dimension::find($id))
		{
			$dimension->delete();

			Session::set_flash('success', 'Deleted dimension #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete dimension #'.$id);
		}

		Response::redirect('dimension');

	}


   public function action_getdimensiones()
   {
       $this->template = '';
       $dimensiones = Model_Dimension::find('all');

       $select = array();

       if ($dimensiones)
       {
           foreach($dimensiones as $dimension)
           {
                $select[$dimension->id] = $dimension->descipcion;
           }

       }
       else
       {
           $select = array('none'=>'Aun no tiene dimensiones creadas');
       }

       echo Form::select('dimension_id', 'none', $select);
   }


}