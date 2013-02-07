<?php

class Controller_Diagramador extends Controller_Admin
{
    public $template = 'template_diagramador';

    public function before()
    {
        $this->template = Session::get('template');
        parent::before();
    }


    public function action_index()
    {
        $secciones = Model_Seccion::find('all');
        $data['secciones'] = null;

        if($secciones)
        {
            $fi = date("Y-m-d") .' 01:00:00';
            $ff = date("Y-m-d") .' 23:59:00';
            $fecha_inicio   = Date::create_from_string($fi,"mysql");
            $fecha_fin   = Date::create_from_string($ff,"mysql");
            $cuantos_array = array();
            foreach($secciones as $s){


                $query_cuantos = "

                            SELECT
                                COUNT(seccion_id) AS total
                            FROM
                                articulos
                            WHERE
                                fecha_publicacion
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
        $fecha_inicio   = Date::create_from_string($fi,"mysql");
        $fecha_fin   = Date::create_from_string($ff,"mysql");

        $articulos = Model_Articulo::find('all',
            array(
                'related' => array('fotos', 'seccion'),
                'where' =>
                array(
                    array('seccion_id', '=', $seccion_id),
                    array('fecha_publicacion', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
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

    public function action_zip($articulo_id = null)
    {
        is_null($articulo_id) and Response::redirect('diagramador');

        $articulos = Model_Articulo::find('all',
            array(
                'related' => array('fotos', 'seccion'),
                'where' =>
                array(
                    array('id', '=', $articulo_id)
                )
            )
        );

        $files_to_zip = array();

		
		$archivo_informacion = '';
        foreach($articulos as $articulo)
        {
		$archivo_informacion .= "Nombre del Articulo: ".$articulo->nombre."\n";
		$archivo_informacion .= "Seccion del Articulo: ".$articulo->seccion->descripcion."\n";
        $archivo_informacion .= "Fecha del Articulo: ". date ( 'Y-m-d H:i:s' , $articulo->fecha_publicacion ) . "\n";
		$archivo_informacion .= "\n ==========================\n";		
            foreach($articulo->fotos as $foto)
            {
                if ($foto->estado == 1)
                {
                    array_push($files_to_zip, $foto->imagen);
                    $nombre_archivo = str_ireplace(".jpg", "-".$articulo->pagina->descripcion.".jpg",$foto->imagen);
                    $pieces = explode("/", $nombre_archivo);
                    $count_foto = count($pieces);
                    $nombre_archivo = $pieces[$count_foto-1];
                    $archivo_informacion .= $nombre_archivo . "\n" . "Medida: ". $foto->dimension->descipcion . "\n" . "Pagina: " . $articulo->pagina->descripcion  . "\n ==========================\n";

                }
            }
        }

        $time = time();

        File::create(DOCROOT . "zip/" , "info_{$articulo_id}_{$time}.txt", $archivo_informacion);

        array_push($files_to_zip, "/gr/public/zip/info_{$articulo_id}_{$time}.txt");

        Zip::create_zip($files_to_zip, $articulo_id, true ,$time, $articulo->pagina->descripcion);
    }

}