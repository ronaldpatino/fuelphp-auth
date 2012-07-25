<?php
class Controller_Articulo extends Controller_Admin
{
	public function action_index()
	{

        $fi = date("Y-m-d") .' 01:00:00';
        $ff = date("Y-m-d") .' 23:59:00';
        $fecha_inicio   = Date::create_from_string($fi,"mysql");
        $fecha_fin   = Date::create_from_string($ff,"mysql");

        $data['articulos'] = Model_Articulo::find('all',
            array(  'related' => array('fotos','seccion'),
                'where' =>
                array(
                    array('periodista_id', '=', $this->user_id),
                    array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                )
            )
        );

        $select_secciones = array();

        $secciones = Model_Seccion::find('all');
        if ($secciones)
        {
            foreach($secciones as $seccion)
            {
                $select_secciones[$seccion->id] = $seccion->descripcion;
            }

        }
        else
        {
            $select_secciones = array('none'=>'No existen secciones creadas');
        }

        $data['select_secciones'] = $select_secciones;

        $view = View::forge('template');
        $view->set_global('user_id', $this->user_id);
        $view->set_global('data', $data);
        $view->set_global('select_secciones', $select_secciones);
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
        Response::redirect('articulo');
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Articulo');

		$articulo = Model_Articulo::find($id);

        $select_secciones = array();

        $secciones = Model_Seccion::find('all');
        if ($secciones)
        {
            foreach($secciones as $seccion)
            {
                $select_secciones[$seccion->id] = $seccion->descripcion;
            }

        }
        else
        {
            $select_secciones = array('none'=>'No existen secciones creadas');
        }

        $this->template->set_global('select_secciones', $select_secciones, false);

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
