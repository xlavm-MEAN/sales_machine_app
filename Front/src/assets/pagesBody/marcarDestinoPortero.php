<?php

$title = 'Marcar Destino';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Portero'){//validamos el inicio de sesión
    include_once '../pagesIncludes/menuPorteros.php'; 
}else{
     ?>
     <script>
         //se redirecciona a dicha pagina
         document.location.href = '../pagesIncludes/ObjetoNoEncontrado.php';
     </script>
     <?php
 }

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/marcarDestinoValidar.php";
?>

<section class="content-header">
    <h1>
        Marcar Destino
        <small>Marque aquí el destino del elemento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Marcar Destino</li>
        <a target='_blank' href="../img/ayuda/marcarDestinoPortero.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>


<!-- FORMULARIO -->
<form method="post">
<section class="content">
    <div class="box box-default">

        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
            <h3 class="box-title">Marque el Destino</h3>
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
                                <label >Seleccione Destino</label>
                                <div>
                                    <select class="form-control" name="select_destino" id="select_destino" onchange="obtenerDestino();">
                                            <option value="">Otro</option>
                                            <option value="Fuera del Centro">Fuera del Centro</option>                      
                                    </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label >Otro</label>
                                    <div>
                                        <input type="text" class="form-control" name="destino" id="destino">
                                    </div>
                                </div>


                                        <!--capturo la accion-->
                                        <input type="hidden" class="form-control" name="funcionario" value="<?php echo ($_GET['funcionario'])?>">
                                        <input type="hidden" class="form-control" name="idFuncionario" value="<?php echo ($_GET['idFuncionario'])?>">
                                        <input type="hidden" class="form-control" name="subaccion" value="<?php echo ($_GET['subaccion'])?>">
                                        <input type="hidden" class="form-control" name="placa" value="<?php echo ($_GET['placa'])?>">
                                        <button type="submit" name="btndestino"class="btn btn-info pull-right">Guardar Destino <i class="fa fa-search"></i></button>
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

<!--Script que pasa el valor del select al text-->
<script type="text/javascript">
    /**
    * Funcion que se ejecuta cada vez que se seleccione un valor en el select del html y que 
    * pasa el valor al campo de texto text
    */
    function obtenerDestino(){
        // asigno al text del destino, el valor del destino seleccionado
        destino.value = document.getElementById("select_destino").value;
    }
</script>