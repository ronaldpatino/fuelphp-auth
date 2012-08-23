<?php

class Controller_Buscar extends Controller_Template
{
    //public $template = 'template_diagramador';

    public function action_buscar()
    {
        \Config::load('phpthumb');
        $document_root = str_replace("\\", "/", Config::get('photos_path'));
        $termino = Input::get('p');
        $fotos = Search::buscar($document_root . '/*', $termino);
        $data['fotos'] = null;

        if ($fotos)
        {
            $data['fotos'] = $fotos;
        }


        $this->template->title = 'Resultado de Busqueda';
        $this->template->content = View::forge('buscar/buscar', $data);
    }

}