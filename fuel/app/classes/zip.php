<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ba01000660
 * Date: 22/08/12
 * Time: 05:30 PM
 * To change this template use File | Settings | File Templates.
 */
class Zip
{
    public static function create_zip($files = array(),$destination = '',$overwrite = true, $time, $pagina=null) {

        \Config::load('phpthumb');

        $document_root = str_replace("\\", "/", Config::get('document_root'));
        //$document_root = Config::get('document_root');

        $zip_dowload = $destination . '_' . $time . '.zip';
        $destination = $document_root . "/gr/public/zip/" . $destination. '_' . $time . '.zip';

        //if the zip file already exists and overwrite is false, return false
        if(file_exists($destination) && !$overwrite) { return false; }
        //vars
        $valid_files = array();
        //if files were passed in...
        if(is_array($files)) {
            //cycle through each file
            foreach($files as $file) {
                //make sure the file exists
                if ($pagina)
                {
                    $thefile = $document_root .$file;
                }
                else
                {
                    $thefile = $file;
                }

                if(file_exists($thefile)) {
                    $valid_files[$file] = $thefile;
                }
            }
        }
        //if we have good files...
        if(count($valid_files)) {
            //create the archive
            $zip = new ZipArchive();
            if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }
            //add the files
            foreach($valid_files as $key => $value) {
                if ($pagina)
                {
                    $nombre_archivo = str_ireplace(".jpg", "-".$pagina.".jpg",$key);
                }
                else
                {
                    $nombre_archivo = $key;
                }

                $zip->addFile($value, $nombre_archivo);
            }
            //debug
            //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

            //close the zip -- done!
            $zip->close();

            //check to make sure the file exists

            if ($destination)
            {
                header('Content-type: application/zip');
                header('Content-Disposition: attachment; filename="'.$zip_dowload.'"');
                readfile($destination);
                unlink($destination);

            }
            else
            {
                return false;
            }

        }
        else
        {
            return false;
        }
    }

}
