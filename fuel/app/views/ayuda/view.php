<h2><?php echo $ayuda->titulo; ?></h2>

<?php  echo Form::open(array('action' => '', 'class'=>'well','style'=>'width:800px;'));?>
<fieldset>


<?php if($ayuda->video !== "null"):?>
    <div data-swf="http://releases.flowplayer.org/5.3.2/flowplayer.swf"
         class="flowplayer "
         data-ratio="0.5625"
         data-embed="false"
         data-fullscreen="true"
         data-keyboard="true">

        <video >
            <source type="video/mp4" src="<?php echo \Config::get('base_url').'assets/video/'.$ayuda->video?>"/>
        </video>
    </div>

    <hr/>
<?php endif;?>
    <div class="control-group">
        <label><i class="icon-question-sign"></i> <?php echo $ayuda->descripcion; ?></label>
    </div>


</fieldset>

<?php  echo Form::close();?>
<?php echo Html::anchor('ayuda/index/'.$ayuda->menu, 'Regresar a temas de Ayuda'); ?>

