<?php


class Controller_Foto extends Controller_Template
{

	public function action_index()
	{
		$data['fotos'] = Model_Foto::find('all');
		$this->template->title = "Fotos";
		$this->template->content = View::forge('foto/index', $data);

	}

	public function action_view($id = null)
	{
		$data['foto'] = Model_Foto::find($id);

		is_null($id) and Response::redirect('Foto');

		$this->template->title = "Foto";
		$this->template->content = View::forge('foto/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Foto::validate('create');
			
			if ($val->run())
			{
				$foto = Model_Foto::forge(array(
					'imagen' => Input::post('imagen'),
					'width' => Input::post('width'),
					'height' => Input::post('height'),
					'articulo_id' => Input::post('articulo_id'),
					'dimension_id' => Input::post('dimension_id'),
					'estado' => Input::post('estado'),
				));

				if ($foto and $foto->save())
				{
					Session::set_flash('success', 'Added foto #'.$foto->id.'.');

					Response::redirect('foto');
				}

				else
				{
					Session::set_flash('error', 'Could not save foto.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Fotos";
		$this->template->content = View::forge('foto/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Foto');

		$foto = Model_Foto::find($id);

		$val = Model_Foto::validate('edit');

		if ($val->run())
		{
			$foto->imagen = Input::post('imagen');
			$foto->width = Input::post('width');
			$foto->height = Input::post('height');
			$foto->articulo_id = Input::post('articulo_id');
			$foto->dimension_id = Input::post('dimension_id');
			$foto->estado = Input::post('estado');

			if ($foto->save())
			{
				Session::set_flash('success', 'Updated foto #' . $id);

				Response::redirect('foto');
			}

			else
			{
				Session::set_flash('error', 'Could not update foto #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$foto->imagen = $val->validated('imagen');
				$foto->width = $val->validated('width');
				$foto->height = $val->validated('height');
				$foto->articulo_id = $val->validated('articulo_id');
				$foto->dimension_id = $val->validated('dimension_id');
				$foto->estado = $val->validated('estado');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('foto', $foto, false);
		}

		$this->template->title = "Fotos";
		$this->template->content = View::forge('foto/edit');

	}

	public function action_delete($id = null)
	{
		if ($foto = Model_Foto::find($id))
		{
			$foto->delete();

			Session::set_flash('success', 'Deleted foto #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete foto #'.$id);
		}

		Response::redirect('articulo');

	}

    public function action_add()
    {
        $this->template = '';



        $foto_existe = Model_Foto::find('all',array(
                                                    'where' =>
                                                        array(  'articulo_id' => Input::post('articulo_id'),
                                                                'imagen' => Input::post('imagen')
                                                             )
                                                        )
                                        );

        if ($foto_existe == null)
        {
            $foto = Model_Foto::forge(array(
                'imagen' => Input::post('imagen'),
                'width' => 110,
                'height' => 110,
                'articulo_id' => Input::post('articulo_id'),
                'dimension_id' => Input::post('dimension_id'),
                'estado' => 0,
            ));

            if ($foto and $foto->save())
            {
                echo '0';
                return;
            }

            echo '1';
            return;
        }

        echo '2';
        return;
    }

    public function action_getarticulos($pid=null)
    {
        $this->template = '';

        if($pid != null)
        {
            $fecha_inicio   = Date::create_from_string(date("m/d/Y") . " 01:00");
            $fecha_fin   = Date::create_from_string(date("m/d/Y") . " 24:00");

            $articulos = Model_Articulo::find('all',
                                                    array(
                                                            'where' =>
                                                            array(
                                                                array('periodista_id', '=', '1'),
                                                                array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                                                            )
                                                    )
            );

           $select = array();

            if ($articulos)
            {
                foreach($articulos as $articulo)
                {
                        $select[$articulo->id] = $articulo->nombre;
                }

                if(count($select)< 1)
                {
                    $select = array('none'=>'Aun no tiene articulos creados');
                }
            }
            else
            {
                $select = array('none'=>'Aun no tiene articulos creados');
            }

            echo Form::select('articulo_id', 'none', $select);
        }
    }

}