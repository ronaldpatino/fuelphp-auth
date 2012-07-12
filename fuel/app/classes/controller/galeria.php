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
    public function action_index()
    {
        $galeria = Gallery::generate();

        $data['thumbnails'] = $galeria['thumbnails'];
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
