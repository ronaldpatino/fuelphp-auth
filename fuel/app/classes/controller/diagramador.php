<?php

class Controller_Diagramador extends Controller_Template
{
    //public $template = 'template_diagramador';

    public function action_index()
    {
        $secciones = Model_Seccion::find('all');
        $data['secciones'] = null;

        if($secciones)
        {
            $fi = date("Y-m-d") .' 01:00:00';
            $ff = date("Y-m-d") .' 23:59:00';
            $fecha_inicio   = Date::create_from_string($fi,"us");
            $fecha_fin   = Date::create_from_string($ff,"mysql");
            $cuantos_array = array();
            foreach($secciones as $s){


                $query_cuantos = "

                            SELECT
                                COUNT(seccion_id) AS total
                            FROM
                                articulos
                            WHERE
                                created_at
                            BETWEEN
                              '{$fecha_inicio->get_timestamp()}'
                            AND
                              '{$fecha_fin->get_timestamp()}'
                            AND
                              seccion_id = {$s->id}

                    ";


                $cuantos = DB::query($query_cuantos)->execute();

                $cuantos = $cuantos->as_array();

                $cuantos_array[$s->id] = $cuantos[0]['total'];
            }


            $data['secciones_articulo_count'] = $cuantos_array;
            $data['secciones'] = $secciones;
        }

        $this->template->title = 'Diagramador &raquo; Index';
        $this->template->content = View::forge('diagramador/index', $data);
    }

    public function action_seccion($seccion_id = null)
    {
        is_null($seccion_id) and Response::redirect('diagramador');

        $fi = date("Y-m-d") .' 01:00:00';
        $ff = date("Y-m-d") .' 23:59:00';
        $fecha_inicio   = Date::create_from_string($fi,"us");
        $fecha_fin   = Date::create_from_string($ff,"mysql");

        $articulos = Model_Articulo::find('all',
            array(
                'related' => array('fotos', 'seccion'),
                'where' =>
                array(
                    array('seccion_id', '=', $seccion_id),
                    array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                )
            )
        );


        $data['articulos'] = null;

        if ($articulos)
        {
            $data['articulos'] = $articulos;
        }

        $this->template->title = 'Diagramador &raquo; Index';
        $this->template->content = View::forge('diagramador/seccion', $data);
    }
}