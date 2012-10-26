<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <?php echo Asset::css(array('bootstrap.css','bootstrap-responsive.css','bootstrap-image-gallery.css','custom.css')); ?>
    <style>
        body {
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

    </style>
	<?php echo Asset::js(array('jquery.js','bootstrap.js','bootbox.js','load-image.min.js','bootstrap-image-gallery.js','custom.js'))?>
</head>
<body>
<!-- begin header -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </a>

            <a class="brand" href="/gr">Cat&aacute;logo</a>
            <?php if(isset($usuario)): ?>
            <div class="btn-group pull-right">

                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">

                    <i class="icon-user"></i> <?php echo $usuario;?>

                    <span class="caret"></span>

                </a>

                <ul class="dropdown-menu">

                    <li>
                        <?php echo Html::anchor('profile','Perfil'); ?>
                    </li>

                    <li class="divider"></li>

                    <li>
                        <?php echo Html::anchor('user/logout/','Salir'); ?>
                    </li>

                </ul>

            </div>
            <?php endif;?>

            <div class="nav-collapse">

                <ul class="nav">

                    <?php if(isset($usuario)): ?>
                    <ul class="nav">


                        <li  class="active"><?php echo Html::anchor('manager', 'Usuarios'); ?></li>
                        <li  ><?php echo Html::anchor('seccion', 'Secciones'); ?></li>
                        <li  ><?php echo Html::anchor('dimension', 'Dimensiones'); ?></li>

                        <li><a href="#contact">Ayuda</a></li>

                    </ul>
                    <?php endif;?>


            </div>

            <!--/.nav-collapse -->

        </div>

    </div>

    <!--breadcrumb-->

</div>
<!-- end header -->

<div class="container">


    <div class="row"><!-- begin content-->

        <div class="span12" id="content"><!-- begin title messages-->
            <h3><?php echo $title; ?></h3>
            <hr>
            <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <h4 class="alert-heading">Atenci&oacute;n!</h4>
                <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>

            </div>
            <?php endif; ?>
            <?php if (Session::get_flash('error')): ?>
            <div class="alert alert-error">
                <a class="close" data-dismiss="alert" href="#">&times;</a>
                <h4 class="alert-heading">Atenci&oacute;n!</h4>
                <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
            </div>
            <?php endif; ?>
        </div> <!-- end title messages-->

        <div class="span12"><!-- begin page content-->
            <?php echo $content; ?>
        </div><!-- end page content-->


    </div><!-- end content-->
    <footer>
        <p class="pull-right"></p>
        <p>
            &nbsp;
        </p>
    </footer>

</div>


<!-- Le javascript



================================================== -->

<!-- Placed at the end of the document so the pages load faster -->


</body>

</html>
</body>
</html>