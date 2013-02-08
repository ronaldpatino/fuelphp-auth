<?php

class Controller_Buscar extends Controller_Admin
{
    public $template = 'template';

    public function before()
    {
        $this->template = Session::get('template');
        parent::before();
    }

    public function action_buscar()
    {
        \Config::load('phpthumb');
        $photos_path = str_replace("\\", "/", Config::get('photos_path'));
        $document_root = str_replace("\\", "/", Config::get('document_root'));
        $termino = Input::post('p');

        $fotos = Search::buscar($photos_path . '/*', $termino);
        $data['fotos'] = null;

        if ($fotos)
        {
            $files ="";
            foreach($fotos as $file)
            {
                list($img_width, $img_height, $img_type, $img_attr) = getimagesize($document_root . "/" . $file);
                $files .="<li  class='thumbnail'>"

                        ."<a href='" . Myhtml::img_watermark($file) . "' rel='gallery' title='$file'>"
                        ."<img class='detalle' data-original-title='".$file."' "
                        ."data-content='Dimensiones: {$img_width} por {$img_height} pixels' src='"
                        . Config::get('phpthumbroot') . "phpThumb.php?src=" . $document_root  . $file . "&w=" . Config::get('thumb_size') . "&h="  . Config::get('thumb_size') . "&zc=1' />"
                        ."</a>"
                        ."</li>";
            }

            $data['fotos'] = html_entity_decode($files,ENT_QUOTES);;
        }

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
                    array('fecha_publicacion', '>=', $fecha_inicio->get_timestamp())
                ),
                'order_by' => array('fecha_publicacion' => 'asc')
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

        $data['periodista_id'] = $this->user_id;
        $view = View::forge(Session::get('template'));

        $view->set_global('user_id', 1);
        $view->set_global('data', $data);
        $view->set_global('title', 'Resultado de B&uacute;squeda');
        $view->set_global('content', 'Resultado de BB&uacute;squeda');
        $view->content =  View::forge('buscar/buscar', $data);
        return $view;
    }




}