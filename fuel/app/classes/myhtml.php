<?php

class Myhtml  extends \Fuel\Core\Html
{
    /**
     * Creates an html image tag
     *
     * Sets the alt atribute to filename of it is not supplied.
     *
     * @param	string	the source
     * @param	array	the attributes array
     * @return	string	the image tag
     */
    public static function img($src, $attr = array())
    {
        if ( ! preg_match('#^(\w+://)# i', $src))
        {
            //$src = \Uri::base(false).$src;
        }
        $attr['src'] = 'public/phpthumb/phpThumb.php?src=' . $src . '&amp;w=120&amp;h=120&amp;zc=1';
        $attr['alt'] = (isset($attr['alt'])) ? $attr['alt'] : pathinfo($src, PATHINFO_FILENAME);
        return html_tag('img', $attr);
    }
}
