<?php

class Controller_Editor extends Controller_Template
{

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

    public function action_revisar()
    {
        $this->template->title = 'Editor &raquo; Revisar';

    }
}
