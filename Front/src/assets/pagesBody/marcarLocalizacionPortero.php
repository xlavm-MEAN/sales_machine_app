<?php

$title = 'Marcar Localización';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Portero'){//validamos el inicio de sesión
}else{
     ?>
     <script>
         //se redirecciona a dicha pagina
         document.location.href = '../pagesIncludes/ObjetoNoEncontrado.php';
     </script>
     <?php
 }

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/marcarLocalizacionValidar.php";
?>

<!--esta linea es solo porque no inluí el menu portero-->
<div class="content-wrapper">

<section class="content-header">
    <h1>
    <i class="fa fa-thumb-tack"> </i> Marcar Localización Actual
        <small>Marque aquí sú localización</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Marcar Localización</li>
        <a target='_blank' href="../img/ayuda/marcarLocalizacionPortero.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>


<!-- FORMULARIO -->
<form method="post">
<section class="content">
    <div class="box box-default">

        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
            <h3 class="box-title">Marque la Localización</h3>
        </div>
        <!-- fin encabezado del formulario -->

        <!--con esto centro el formulario-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <!--/con esto centro el formulario-->

                    <div class="box-body">
                        <div class="row">
                            <!-- COLUMNA1 -->
                            <div class="col-md-10">

                                
                <!--MOSTRAR EL ERROR-->
               <?php
                if (isset($error)) {
                    ?>
                    <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o"></i> <?php echo $error; ?></label>
                    </div>                            
                    <?php }
                ?>
                <!--/MOSTRAR EL ERROR-->

                                <!--cada vez que cambie el select, se asigne un valor al text mediante onchange-->
                                <div class="form-group">
                                <label >Seleccione a Localización</label>
                                <div>
                                    <select class="form-control" name="select_localizacion">
                                            <option value="">Seleccione</option>
                                            <option value="Rafael Roldán">Rafael Roldán</option>
                                            <option value="CFMA">CFMA</option>                        
                                    </select>
                                    </div>
                                </div>

                                        <button type="submit" name="btnlocalizacion"class="btn btn-info pull-right">Guardar Localización <i class="fa fa-location-arrow"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.FIN COLUMNA1 -->
                        </div>
                    </div>

                    <!--con esto centro el formulario-->
                </div>
            </div>
        <!--/con esto centro el formulario-->
</section>
</form>
<!-- FIN FORMULARIO -->

<?php

include_once '../pagesIncludes/footer.php';
?>
