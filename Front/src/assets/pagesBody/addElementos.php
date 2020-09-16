<?php

$title = 'Agregar Elemento';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Administrador'){//validamos el inicio de sesión
    include_once '../pagesIncludes/menuAdministrador.php'; 
}else{
     ?>
     <script>
         //se redirecciona a dicha pagina
         document.location.href = '../pagesIncludes/ObjetoNoEncontrado.php';
     </script>
     <?php
 }

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/admElementosValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa-plus-circle text-green"></i> Agregar Elementos
        <small>Agregue aquí los Elementos del Sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Agregar Elementos</li>
        <a target='_blank' href="../img/ayuda/addElementos.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol><br>
</section>


<!-- FORMULARIO -->
<form method="post">
<section class="content">
    <div class="box box-default">
        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
            <h3 class="box-title">Datos del Elemento</h3>
        </div>
        <!-- fin encabezado del formulario -->
        <div class="box-body">

            <!--MOSTRAR EL ERROR-->
            <?php
                if (isset($error)) {
                    ?>
                    <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o"></i> <?php echo $error; ?></label>
                    </div>                            
                    <?php 
                }
            ?>
            <!--/MOSTRAR EL ERROR-->

            <!--MOSTRAR LA ADVERTENCIA DE QUE DEBE CONSULTAR UN FUNCIONARIO-->
            <?php
                if (isset($advertencia)) {
                    ?>
                    <div class="form-group has-warning">
                        <label class="control-label" for="inputWarning">
                            <i class="fa fa-bell-o"></i> <?php echo $advertencia; ?></label>
                    </div>                            
                    <?php 
                }
            ?>
            <!--/MOSTRAR LA ADVERTENCIA DE QUE DEBE CONSULTAR UN FUNCIONARIO-->

            <!--MOSTRAR LA CONFIRMACION DEL FUNCIONARIO-->
            <?php
                if (isset($confirmacion)) {
                    ?>
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">
                            <i class="fa fa-check"></i> <?php echo $confirmacion; ?></label>
                    </div>                            
                    <?php 
                }
            ?>
            <!--/MOSTRAR LA CONFIRMACION DEL FUNCIONARIO-->

            <div class="row">
                <!-- COLUMNA1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Placa</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nro. Placa" name="placa" value="<?php
                                //si ha sido seteado el item entonces muestre el item (si se ha escrito algo), esto para mantener los datos
                                if (isset($placa)) {
                                    echo $placa;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Serial</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nro. Serial" name="serial" value="<?php
                                if (isset($serial)) {
                                    echo $serial;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Modelo" name="modelo" value="<?php
                                if (isset($modelo)) {
                                    echo $modelo;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Descripción</label>
                            <textarea class="form-control" placeholder="Descripción" name="descripcion" ><?php
                                if (isset($descripcion)) {
                                    echo $descripcion;
                                }
                                ?></textarea>
                    </div>

                    <div class="form-group">
                        <label >Descripción Actual</label>                        
                            <textarea  class="form-control" placeholder="Descripción Actual" name="descripcion_actual" ><?php
                                if (isset($descripcion_actual)) {
                                    echo $descripcion_actual;
                                }
                                ?></textarea>
                    </div>

                </div>
                <!-- /.FIN COLUMNA1 -->
                <!--COLUMNA2 -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Fecha de Adquisición</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" name="fecha_adquisicion" id="datepicker" value="<?php
                                if (isset($fecha_adquisicion)) {
                                    echo $fecha_adquisicion;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Valor Ingreso</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Valor Ingreso" name="valor_ingreso" value="<?php
                                if (isset($valor_ingreso)) {
                                    echo $valor_ingreso;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <div>
                            <select class="form-control" name="estado" value="<?php
                                if (isset($estado)) {
                                    echo $estado;
                                }
                                ?>">
                                <option>Disponible</option>
                                <option>Prestado</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cuentadante</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Ingrese el Nro de Documento" name="cuentadante" value="<?php
                                if (isset($cuentadante)) {
                                    echo $cuentadante;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Cancelar <i class="fa fa-remove"></i></button>
                        <button type="submit" class="btn btn-info pull-right" name="btnadd">Agregar <i class="fa fa fa-plus"></i></button>
                    </div>
                </div>
                <!-- /.FIN COLUMNA2 -->
                <!--CAMPO PARA EL ID-->
                <input type="hidden" class="form-control"  name="id" value="<?php
                           if (isset($id)) {
                               echo $id;
                           }
                           ?>">
            </div>
        </div>
    </div>
</section>
</form>
<!-- FIN FORMULARIO -->

<?php
include_once '../pagesIncludes/footer.php';
?>

<!--SCRIPS NECESARIOS PARA EL DATE PICKER-->
<!-- InputMask -->
<script src="../plugins/input-mask/jquery.inputmask.js"></script>
<!-- Select2 -->
<script src="../plugins/select2/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Page script -->
<script>
    $(function () {
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
    });
</script>
