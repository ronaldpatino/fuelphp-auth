<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <?php echo Asset::css(array('bootstrap.css','bootstrap-responsive.css','skin/minimalist.css','custom.css')); ?>
    <style>
        body {
            padding-top: 80px;
            padding-bottom: 40px;
        }

        .sidebar-nav {
            padding: 9px 0;
        }

    </style>
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo Asset::js(array('fp/jquery19.js','bootstrap.js','fp/flowplayer.min.js','custom.js'))?>

    <script>
        // global configuration (optional)
        flowplayer.conf = {
            rtmp: "rtmp://s3b78u0kbtx79q.cloudfront.net/cfx/st",
            swf: "http://releases.flowplayer.org/5.3.2/flowplayer.swf"
        };

        // force flash with query - only for testing, do not use this switch in production!
        if (/flash/.test(location.search)) flowplayer.conf.engine = "flash";

    </script>


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

            <a class="brand" href="/gr/ayuda/index/<?php echo $menu_id; ?>">Ayuda</a>

        </div>

    </div>

    <!--breadcrumb-->

</div>
<!-- end header -->

<div class="container">


    <div class="row"><!-- begin content-->

        <div class="span12" id="content"><!-- begin title messages-->

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



</body>

</html>
</body>
</html>