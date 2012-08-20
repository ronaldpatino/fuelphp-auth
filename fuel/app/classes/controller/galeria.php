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

        }
        else
        {
            $select_articulos = array('none'=>'No existen articulos creados');
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
        $view = View::forge('template_gallery');

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
