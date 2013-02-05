<?php

class Gallery
{
    protected static $default_config = array(

        'thumbs_pr_page' => "28", //Number of thumbnails on a single page
        'gallery_width' => "900px", //Gallery width. Eg: "500px" or "70%"
        'backgroundcolor' => "white", //This provides a quick way to change your gallerys background to suit your website. Use either main colors like "black", "white", "yellow" etc. Or HEX colors, eg. "#AAAAAA"
        'templatefile' => "mano", //Template filename (must be placed in 'templates' folder)
        'folder_color' => "black", // Color of folder icons: blue / black / vista / purple / green / grey
        'sorting_folders' => "name", // Sort folders by: [name][date]
        'sorting_files' => "name", // Sort files by: [name][date][size]
        'sortdir_folders' => "ASC", // Sort direction of folders: [ASC][DESC]
        'sortdir_files' => "ASC", // Sort direction of files: [ASC][DESC]

//LANGUAGE STRINGS
        'label_home' => "Inicio Galeria", //Name of home link in breadcrumb navigation
        'label_new' => "Nueva", //Text to display for new images. Use with 'display_new variable
        'label_page' => "Pagina: ", //Text used for page navigation
        'label_all' => "Todas", //Text used for link to display all images in one page
        'label_noimages' => "Sin imagenes", //Empty folder text
        'label_loading' => "Cargando...", //Thumbnail loading text

//ADVANCED SETTINGS
        'thumb_size' => 120, //Thumbnail height/width (square thumbs). Changing this will most likely require manual altering of the template file to make it look properly!
        'label_max_length' => 30, //Maximum chars of a folder name that will be displayed on the folder thumbnail
        'display_exif' => 0,

// DEFINE VARIABLES

        'page_navigation' => "",
        'breadcrumb_navigation' => "",
        'thumbnails' => "",
        'new' => "",
        'images' => "",
        'exif_data' => "",
        'messages' => "",
        'thumbdir' => "",
        'phpthumbroot'=>"/gr/public/phpthumb/",
        'galleryroot'=>"/photos/"
    );

//


    public static function generate()
    {
        //is_null(Input::get('dir')) and Response::redirect('user/login');
        static::$default_config['thumbdir'] = rtrim(Config::get('photos_path') . "/" .Input::get('dir'),"/");

        $currentdir = static::$default_config['thumbdir'];

        //-----------------------
        // READ FILES AND FOLDERS
        //-----------------------
        $files = array();
        $dirs = array();
        if (is_dir($currentdir)) {
            if ($handle = opendir($currentdir)) {
                while (false !== ($file = readdir($handle)))
                {
                    // 1. LOAD FOLDERS
                    if (Gallery::is_directory($currentdir . "/" . $file))
                    {
                        if ($file != "." && $file != ".."  & $file != "cache" && !Gallery::startsWith($file,'.'))
                        {
                            Gallery::checkpermissions($currentdir . "/" . $file); // Check for correct file permission
                            // Set thumbnail to folder.jpg if found:
                            if (file_exists("$currentdir/" . $file . "/folder.jpg"))
                            {
                                $dirs[] = array(
                                    "name" => $file,
                                    "date" => filemtime($currentdir . "/" . $file . "/folder.jpg"),
                                    "html" => "<li class='thumbnail'><a href='?dir="
                                        .ltrim(Input::get('dir') . "/" . $file, "/") . "'><em>"
                                        . Gallery::padstring($file, static::$default_config['label_max_length'])
                                        . "</em><span></span><img src='" . static::$default_config['phpthumbroot']
                                        . "phpThumb.php?src=$currentdir/" . $file . "/folder.jpg&amp;w=thumb_size&amp;h=" . static::$default_config['thumb_size'] ."&amp;zc=1'/></a></li>");
                            }  else
                            {
                                // Set thumbnail to first image found (if any):
                                unset ($firstimage);
                                $firstimage = Gallery::getfirstImage("$currentdir/" . $file);
                                if ($firstimage != "") {
                                    $dirs[] = array(
                                        "name" => $file,
                                        "date" => filemtime($currentdir . "/" . $file),
                                        "html" => "<li class='thumbnail'>"
                                            . "<a href='?dir=" . ltrim(Input::get('dir') . "/" . $file, "/") . "'>"
                                            . "<img src='"
                                            . static::$default_config['phpthumbroot'] . "phpThumb.php?src=". static::$default_config['thumbdir'] ."/" . $file . "/" . $firstimage
                                            . "&amp;w=". static::$default_config['thumb_size'] ."&amp;h=".static::$default_config['thumb_size']."&amp;zc=1' /></a>"
                                            . "<a href='?dir=" . ltrim(Input::get('dir') . "/" . $file, "/") . "'>"
                                            . "<h5>". Gallery::padstring($file, static::$default_config['label_max_length'])."</h5>"
                                            . '</a>'
                                            . "</li>");
                                } else {
                                    // If no folder.jpg or image is found, then display default icon:
                                    $dirs[] = array(
                                        "name" => $file,
                                        "date" => filemtime($currentdir . "/" . $file),
                                        "html" => "<li class='thumbnail'>"
                                            . "<a href='?dir=" . ltrim(Input::get('dir') . "/" . $file, "/") . "'>"
                                            . "<img src='public/assets/img/folder_" . strtolower(static::$default_config['folder_color']) . ".png' width='" . static::$default_config['thumb_size'] ."' height='" . static::$default_config['thumb_size'] . "' />"
                                            . "<h5>". Gallery::padstring($file, static::$default_config['label_max_length'])."</h5>"
                                            . "</li>");

                                }
                            }
                        }
                    }

                    // 2. LOAD FILES
                    if ($file != "." && $file != ".." && $file !== "folder.jpg" && !Gallery::startsWith($file,'.'))
                    {
                        // JPG, GIF and PNG
                        if (preg_match("/.jpg$|.gif$|.png$/i", $file))
                        {

                            Gallery::checkpermissions($currentdir . "/" . $file);
                            list($img_width, $img_height, $img_type, $img_attr) = getimagesize($currentdir . "/" . $file);									
							$imagen_destino = static::$default_config['galleryroot'] . Input::get('dir') . "/" . $file;
                            $files[] = array (
                                "name" => $file,
                                "date" => filemtime($currentdir . "/" . $file),
                                "size" => filesize($currentdir . "/" . $file),
                                "html" => 	"<li  class='thumbnail'>"                                    
									."<a href='" . Myhtml::img_watermark($imagen_destino) . "' rel='gallery' title='$file'>"
									//."<a href='http://" . gethostname() . static::$default_config['galleryroot'] . Input::get('dir') . "/" . Myhtml::img_watermark($file) . "' rel='gallery' title='$file'>"
                                    
									."<img class='detalle' data-original-title='".$file."' "
                                    ."data-content='Dimensiones: {$img_width} por {$img_height} pixels' src='"
                                    . static::$default_config['phpthumbroot'] . "phpThumb.php?src=" . static::$default_config['thumbdir'] . "/" . $file . "&amp;w=" . static::$default_config['thumb_size'] . "&amp;h="  . static::$default_config['thumb_size'] . "&amp;zc=1' />"
                                    ."</a>"
                                    ."</li>");															
                        }

							
                        /*
                        // Other filetypes
                        $extension = "";
                        if (preg_match("/.pdf$/i", $file)) $extension = "PDF"; // PDF
                        if (preg_match("/.zip$/i", $file)) $extension = "ZIP"; // ZIP archive
                        if (preg_match("/.rar$|.r[0-9]{2,}/i", $file)) $extension = "RAR"; // RAR Archive
                        if (preg_match("/.tar$/i", $file)) $extension = "TAR"; // TARball archive
                        if (preg_match("/.gz$/i", $file)) $extension = "GZ"; // GZip archive
                        if (preg_match("/.doc$|.docx$/i", $file)) $extension = "DOCX"; // Word
                        if (preg_match("/.ppt$|.pptx$/i", $file)) $extension = "PPTX"; //Powerpoint
                        if (preg_match("/.xls$|.xlsx$/i", $file)) $extension = "XLXS"; // Excel

                        if ($extension != "")
                        {
                            $files[] = array (
                                "name" => $file,
                                "date" => filemtime($currentdir . "/" . $file),
                                "size" => filesize($currentdir . "/" . $file),
                                "html" => "<li  class='thumbnail'><a href='" . $currentdir . "/" . $file . "' title='$file'><em-pdf>" . Gallery::padstring($file, 20) . "</em-pdf><span></span><img src='" . static::$default_config['phpthumbroot'] . "images/filetype_" . $extension . ".png' width='" . static::$default_config['thumb_size'] . "' height='" . static::$default_config['thumb_size'] . "' alt='$file' /></a></li>");
                        }
                        */
                    }


                } //end while (false !== ($file = readdir($handle)))
                closedir($handle);
            }//end if ($handle = opendir($currentdir))
            else {
                die("ERROR: Could not open $currentdir for reading!");
            }
        }
    //-----------------------
    // SORT FILES AND FOLDERS
    //-----------------------
    //-----------------------
    // OFFSET DETERMINATION
    //-----------------------
        $offset_start = (Input::get('page') * static::$default_config['thumbs_pr_page']) - static::$default_config['thumbs_pr_page'];
        if (is_null(Input::get('page'))) $offset_start = 0;
        $offset_end = $offset_start + static::$default_config['thumbs_pr_page'];
        if ($offset_end > sizeof($dirs) + sizeof($files)) $offset_end = sizeof($dirs) + sizeof($files);

        if (Input::get('page') == "all")
        {
            $offset_start = 0;
            $offset_end = sizeof($dirs) + sizeof($files);
        }

        $get_page = is_null(Input::get('page'))?1 :Input::get('page');
        if (sizeof($dirs) + sizeof($files) > static::$default_config['thumbs_pr_page'])
        {
            static::$default_config['page_navigation'] .= static::$default_config['label_page'] ;

            for ($i=1; $i <= ceil((sizeof($files) + sizeof($dirs)) / static::$default_config['thumbs_pr_page']); $i++)
            {
                if ($get_page == $i)
                {
                    static::$default_config['page_navigation'] .= "$i";
                }
                else
                {
                    static::$default_config['page_navigation'] .= "<a href='?dir=" . Input::get('dir') . "&amp;page=" . ($i) . "'>" . $i . "</a>";
                }

                if ($i != ceil((sizeof($files) + sizeof($dirs)) / static::$default_config['thumbs_pr_page']))
                {
                    static::$default_config['page_navigation'] .= " | ";
                }

            }
            //Insert link to view all images
            if ($get_page == "all")
            {
                static::$default_config['page_navigation'] .= " |  " . static::$default_config['label_all'];
            }
            else
            {
                static::$default_config['page_navigation'] .= " | <a href='?dir=" . Input::get('dir') . "&amp;page=all'>" . static::$default_config['label_all'] . "</a>";
            }
        }

        //-----------------------
        // BREADCRUMB NAVIGATION
        //-----------------------
        if (Input::get('dir') != "")
        {
            static::$default_config['breadcrumb_navigation'] .= "<li><a href='?dir='>" . static::$default_config['label_home'] . "</a> <span class='divider'>/</span></li>";
            $navitems = explode("/", Input::get('dir'));
            for($i = 0; $i < sizeof($navitems); $i++)
            {
                if ($i == sizeof($navitems)-1) static::$default_config['breadcrumb_navigation'] .= $navitems[$i];
                else
                {
                    static::$default_config['breadcrumb_navigation'] .= "<li><a href='?dir=";
                    for ($x = 0; $x <= $i; $x++)
                    {
                        static::$default_config['breadcrumb_navigation'] .= $navitems[$x];
                        if ($x < $i) static::$default_config['breadcrumb_navigation'] .= "/";
                    }
                    static::$default_config['breadcrumb_navigation'] .= "'>" . $navitems[$i] . "</a><span class='divider'>/</span></li>";
                }
            }
        }
        else
        {
            static::$default_config['breadcrumb_navigation'] .= static::$default_config['label_home'];
        }

        //-----------------------
        // DISPLAY FOLDERS
        //-----------------------
        if (count($dirs) + count($files) == 0) {
            static::$default_config['thumbnails'] .= "<li  class='thumbnail'>" . static::$default_config['label_noimages'] . "</li>"; //Display 'no images' text
            //if($currentdir == "photos") $messages = "It looks like you have just installed MiniGal Nano. Please run the <a href='system_check.php'>system check tool</a>";
        }
        $offset_current = $offset_start;
        for ($x = $offset_start; $x < sizeof($dirs) && $x < $offset_end; $x++)
        {
            $offset_current++;
            static::$default_config['thumbnails'] .= $dirs[$x]["html"];
        }

        //-----------------------
        // DISPLAY FILES
        //-----------------------
        for ($i = $offset_start - sizeof($dirs); $i < $offset_end && $offset_current < $offset_end; $i++)
        {
            if ($i >= 0)
            {
                $offset_current++;
                static::$default_config['thumbnails'] .= $files[$i]["html"];
            }
        }

        $data['thumbnails'] = html_entity_decode(static::$default_config['thumbnails'],ENT_QUOTES);
        $data['breadcrumb_navigation'] = static::$default_config['breadcrumb_navigation'];
        $data['page_navigation'] = static::$default_config['page_navigation'];


        return $data;
    }

// private static functionS
    private static function is_directory($filepath)
    {
        // $filepath must be the entire system path to the file
        if (!@opendir($filepath)) return FALSE;
        else {
            //closedir($filepath);
            return TRUE;

        }
    }

    private static function padstring($name, $length)
    {
        global $label_max_length;
        if (!isset($length)) $length = $label_max_length;
        if (strlen($name) > $length) {
            return substr($name, 0, $length) . "...";
        } else return $name;
    }

    private static function getfirstImage($dirname)
    {
        $imageName = false;
        $ext = array("jpg", "png", "jpeg", "gif", "JPG", "PNG", "GIF", "JPEG");
        if ($handle = opendir($dirname)) {
            while (false !== ($file = readdir($handle))) {
                $lastdot = strrpos($file, '.');
                $extension = substr($file, $lastdot + 1);
                if ($file[0] != '.' && in_array($extension, $ext)) break;
            }
            $imageName = $file;
            closedir($handle);
        }
        return ($imageName);
    }

    private static function readEXIF($file)
    {
        $exif_data = "";
        $exif_idf0 = exif_read_data($file, 'IFD0', 0);
        $emodel = $exif_idf0['Model'];

        $efocal = $exif_idf0['FocalLength'];
        list($x, $y) = split('/', $efocal);
        $efocal = round($x / $y, 0);

        $exif_exif = exif_read_data($file, 'EXIF', 0);
        $eexposuretime = $exif_exif['ExposureTime'];

        $efnumber = $exif_exif['FNumber'];
        list($x, $y) = split('/', $efnumber);
        $efnumber = round($x / $y, 0);

        $eiso = $exif_exif['ISOSpeedRatings'];

        $exif_date = exif_read_data($file, 'IFD0', 0);
        $edate = $exif_date['DateTime'];
        if (strlen($emodel) > 0 OR strlen($efocal) > 0 OR strlen($eexposuretime) > 0 OR strlen($efnumber) > 0 OR strlen($eiso) > 0) $exif_data .= "::";
        if (strlen($emodel) > 0) $exif_data .= "$emodel";
        if ($efocal > 0) $exif_data .= " | $efocal" . "mm";
        if (strlen($eexposuretime) > 0) $exif_data .= " | $eexposuretime" . "s";
        if ($efnumber > 0) $exif_data .= " | f$efnumber";
        if (strlen($eiso) > 0) $exif_data .= " | ISO $eiso";
        return ($exif_data);
    }

    private static function checkpermissions($file)
    {
        global $messages;
        if (substr(decoct(fileperms($file)), -1, strlen(fileperms($file))) < 4 OR substr(decoct(fileperms($file)), -3, 1) < 4) $messages = "At least one file or folder has wrong permissions. Learn how to <a href='http://minigal.dk/faq-reader/items/how-do-i-change-file-permissions-chmod.html' target='_blank'>set file permissions</a>";
    }

    private static function startsWith($haystack, $needle)
    {
        return strpos($haystack, $needle) === 0;
    }
}
