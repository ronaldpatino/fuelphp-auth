<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ba01000660
 * Date: 23/08/12
 * Time: 12:34 PM
 * To change this template use File | Settings | File Templates.
 */
class Search
{

    private static function rglob($pattern, $flags = 0) {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
            if (!strstr($dir,'cache') )
            {
                $files = array_merge($files, Search::rglob($dir.'/'.basename($pattern), $flags));
            }
        }
        return $files;
    }


    private static function searchfile($dirs, $pattern)
    {
        $resultado = array();
        foreach($dirs as $dir)
        {
            $files = glob($dir.'/'.$pattern);

            if (count($files))
            {
                array_push($resultado, $files);
            }
        }

        return $resultado;
    }


    public static function buscar($path, $cadena)
    {
        $directorios = Search::rglob($path, GLOB_ONLYDIR);
        $archivos = Search::searchfile($directorios, $cadena);
        if (count($archivos))
        {
            foreach($archivos as $ars)
            {
                foreach($ars as $a)
                {
                    $resultado[] = $a;
                }
            }
            return $resultado;
        }
        return false;

    }
}
