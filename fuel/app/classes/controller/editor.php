<?php

class Controller_Editor extends Controller_Admin
{
    public $template = 'template_editor';

    public function action_index()
	{
        $fi = date("Y-m-d") .' 01:00:00';
        $ff = date("Y-m-d") .' 23:59:00';
        $fecha_inicio   = Date::create_from_string($fi,"us");
        $fecha_fin   = Date::create_from_string($ff,"mysql");

        $query_periodistas = "
            SELECT
                id,
                username
            FROM
                users
            WHERE
                id
            IN
                (
                    SELECT DISTINCT
                        periodista_id
                    FROM
                        articulos
                    WHERE
                        created_at
                    BETWEEN
                      '{$fecha_inicio->get_timestamp()}'
                    AND
                      '{$fecha_fin->get_timestamp()}'
                )
            ";


        $periodistas = DB::query($query_periodistas)->execute();

        $data['periodistas'] = null;

        if($periodistas)
        {
            $data['periodistas'] = $periodistas->as_array();
        }

        $this->template->title = 'Editor &raquo; Index';
		$this->template->content = View::forge('editor/index', $data);
	}

    public function action_revisar($user_id = null)
    {
        is_null($user_id) and Response::redirect('editor');

        $fi = date("Y-m-d") .' 01:00:00';
        $ff = date("Y-m-d") .' 23:59:00';
        $fecha_inicio   = Date::create_from_string($fi,"mysql");
        $fecha_fin   = Date::create_from_string($ff,"mysql");

        $data['articulos'] = Model_Articulo::find('all',
            array(  'related' => array('fotos','seccion'),
                'where' =>
                array(
                    array('periodista_id', '=', $user_id),
                    array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                )
            )
        );


        $periodista  = Model_User::find($user_id);
        $data['periodista'] = $periodista;

        $view = View::forge('template_editor');
        $view->set_global('user_id', $this->user_id);


        $view->set_global('data', $data);
        $view->set_global('title', 'Articulos del periodista: ' . $periodista->username);
        $view->content = View::forge('editor/revisar',$data);
        return $view;
    }

    public function action_aprobar($foto_id = null, $user_id = null)
    {
        is_null($foto_id) and Response::redirect('editor');
        is_null($user_id) and Response::redirect('editor');
        $foto = Model_Foto::find($foto_id);
        $foto->estado = 1;
        $foto->save();
        Session::set_flash('success', 'Foto ' . $foto->imagen . ' aprobada');
        Response::redirect('editor/revisar/' . $user_id);

    }

    public function action_rechazar($foto_id = null, $user_id = null)
    {
        is_null($foto_id) and Response::redirect('editor');
        is_null($user_id) and Response::redirect('editor');

        $foto = Model_Foto::find($foto_id);
        $foto->estado = 2;
        $foto->save();
        Session::set_flash('error', 'Foto ' . $foto->imagen . ' rechazada');
        Response::redirect('editor/revisar/' . $user_id);
    }

}