<div class="alert alert-success" style="display:none;" id="alerta">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Atenci&oacute;n!</h4>
    <p id="mensaje_alerta"><p>
</div>

<div class="alert alert-error" style="display:none;" id="alerta_error">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading">Error!</h4>
    <p id="mensaje_error"><p>
</div>



<div id="container">
    <div id="gallery" data-toggle="modal-gallery" data-target="#modal-gallery">
        <ul class="thumbnails">
            <?php echo html_entity_decode($thumbnails, ENT_QUOTES) ?>
        </ul>
    </div>
</div>
<br />
<div id="page_nav"><% page_navigation %></div>
<br />

<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">

        <form class="well form-inline" id="searchForm" action="/gr/foto/add/">
            <a class="btn modal-download" target="_blank">
                <i class="icon-download"></i>
                <span>Descargar</span>
            </a>
            <input name='periodista_id' id="form_periodista_id"  type="hidden"/>

            <span id="articulo_container"></span>
            <span id="dimension_container"></span>

            <button type="submit" class="btn btn-primary"><i class="icon-plus"></i> Agregar Imagen</button>
        </form>
    </div>
</div>

<script>

    $(document).ready(function() {
        $.ajax({
            url: '/gr/user/estaactivo/',
            success:
                function(data) {
                    console.log(data);
                    if(data.user_id != 0)
                    {
                        $("#form_periodista_id").val(data.user_id),

                            $.get('/gr/foto/getarticulos/1',
                                function(data) {
                                    $('#articulo_container').html(data);
                                });
                        $.get('/gr/dimension/getdimensiones/',
                            function(data) {
                                $('#dimension_container').html(data);
                            });
                    }
                    else
                    {
                        alert("no logeado");
                        var url = "http://localhost/gr/";
                        $(location).attr('href',url);
                    }
                },
            dataType: 'json'
        });

    });

    /* attach a submit handler to the form */
    $("#searchForm").submit(function(event) {
        /* stop form from submitting normally */
        event.preventDefault();

        /* get some values from elements on the page: */
        var $form = $( this ),
            term =  $("#form_articulo_id option:selected").val(),
            imagen = $('img.in').attr("src"),
            url = $form.attr( 'action' );
        periodista_id = $("#periodista_id").val(),
            dimension_id = $("#form_dimension_id option:selected").val()

        /* Send the data using post and put the results in a div */
        $.post( url,
            {
                articulo_id: term,
                imagen: imagen,
                periodista_id:periodista_id,
                dimension_id: dimension_id
            },
            function( data ) {

                switch(data){
                    case '0':
                        console.log(data);
                        $("#mensaje_alerta" ).html("La imagen " + imagen + " ha sido agregada al articulo: " + $("#articulo_id option:selected").val());
                        $( "#alerta" ).show();
                        $('#modal-gallery').modal('hide');
                        break;
                    case '1':
                        console.log(data);
                        $("#mensaje_error" ).html("La imagen " + imagen + " no pudo ser agregada al articulo: " + $("#articulo_id option:selected").val());
                        $( "#alerta_error" ).show();
                        $('#modal-gallery').modal('hide');
                        break;
                    case '2':
                        console.log(data);
                        $("#mensaje_error" ).html("La imagen " + imagen + " ya esta agregada al articulo: " + $("#articulo_id option:selected").val());
                        $( "#alerta_error" ).show();
                        $('#modal-gallery').modal('hide');
                        break;
                }

            }
        );
    });
</script>
