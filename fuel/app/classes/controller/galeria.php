<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ba01000660
 * Date: 12/07/12
 * Time: 05:16 PM
 * To change this template use File | Settings | File Templates.
 */
class Controller_Galeria  extends Controller_Admin
{
    public $template = 'template_gallery';


    public function action_index()
    {
        \Config::load('phpthumb');
        //Incio articulos
	    $fi = date("Y-m-d") .' 01:00:00';
        $ff = date("Y-m-d") .' 23:59:00';
        $fecha_inicio   = Date::create_from_string($fi,"mysql");
        $fecha_fin   = Date::create_from_string($ff,"mysql");

        $articulos = null;
        if(Auth::instance()->has_access('Controller_Editor.index'))
        {
            $padre_id = Auth::instance()->get_user_id();
            $query_periodistas = "
                                    SELECT
                                        id,
                                        username,
                                        empresa,
                                        padre
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
                                    AND
                                        padre = {$padre_id[1]}
                                    ";


            $periodistas = DB::query($query_periodistas)->execute();


            $periodistas_id = null;
            if ($periodistas){
                foreach($periodistas as $periodista)
                {
                    $periodistas_id[] = $periodista['id'];
                }


            }

            $articulos = ( $periodistas_id != null) ? Model_Articulo::find('all',
                array(  'related' => array('fotos','seccion'),
                    'where' =>
                    array(
                        array('periodista_id', 'in', $periodistas_id),
                        array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                    )
                )
            ):null;

            $articulos_otros = ( $periodistas_id != null) ? Model_Articulo::find('all',
                array(  'related' => array('fotos','seccion'),
                    'where' =>
                    array(
                        array('periodista_id', 'not in', $periodistas_id),
                        array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                    )
                )
            ):
                Model_Articulo::find('all',
                    array(  'related' => array('fotos','seccion'),
                        'where' =>
                        array(
                            array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                        )
                    )
                )
            ;

            $select_articulos = array();

            if ($articulos || $articulos_otros)
            {
                if ($articulos)
                {
                    foreach($articulos as $articulo)
                    {
                        $cronista = Model_User::find($articulo->periodista_id);
                        $select_articulos[$articulo->id] = $articulo->nombre . ' -> ' . $cronista->username;
                    }
                }

                if ($articulos || $articulos_otros)
                {
                    foreach($articulos_otros as $articulo)
                    {
                        $cronista = Model_User::find($articulo->periodista_id);
                        $select_articulos[$articulo->id] = '[ ' . $articulo->nombre . ' -> ' . $cronista->username . ' ]';
                    }
                }

                $data['boton_activo'] = 1;
            }
            else
            {
                $select_articulos = array('none'=>'No existen articulos creados');
                $data['boton_activo'] = 0;

            }


        }
        else
        {
            $articulos = Model_Articulo::find('all',
                array(  'related' => array('fotos','seccion'),
                    'where' =>
                    array(
                        array('periodista_id', '=', $this->user_id),
                        array('created_at', 'between', array($fecha_inicio->get_timestamp(), $fecha_fin->get_timestamp()))
                    )
                )
            );

            $select_articulos = array();


            if ($articulos)
            {
                foreach($articulos as $articulo)
                {
                    $select_articulos[$articulo->id] = $articulo->nombre;
                }
                $data['boton_activo'] = 1;
            }
            else
            {
                $select_articulos = array('none'=>'No existen articulos creados');
                $data['boton_activo'] = 0;

            }

        }





        $data['select_articulos'] = $select_articulos;

        // Fin articulos

        // Inicio Dimensiones
        $dimensiones = Model_Dimension::find('all');

        $select_dimensiones = array();

        if ($dimensiones)
        {
            foreach($dimensiones as $dimension)
            {
                $select_dimensiones[$dimension->id] = $dimension->descipcion;
            }

        }
        else
        {
            $select_dimensiones = array('none'=>'No existen dimensiones creadas');
        }

        $data['select_dimensiones'] = $select_dimensiones;
        //Fin dimensiones

        $galeria = Gallery::generate();
        $data['thumbnails'] = $galeria['thumbnails'];
        $data['periodista_id'] = $this->user_id;

        if(Auth::instance()->has_access('Controller_Editor.index'))
        {
            $view = View::forge('template_gallery_editor');
        }
        else
        {
            $view = View::forge('template_gallery');
        }



        $view->set_global('user_id', $this->user_id);
        $view->set_global('data', $galeria['thumbnails']);
        $view->set_global('breadcrumb_navigation', $galeria['breadcrumb_navigation']);
        $view->set_global('page_navigation', $galeria['page_navigation']);
        $view->set_global('title', 'Galer&iacute;a');
        $view->set_global('content', 'Galer&iacute;a');
        $view->content = View::forge('galeria/index',$data);
        return $view;
        //die();
    }

}
