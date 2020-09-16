<?php
include_once '../_entidad/ElementoDto.php';
include_once '../_entidad/UsuarioDto.php';

$title = 'Editar Elemento';
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


$elementoConsul = $_SESSION['ElementoConsultado'];
$cuentadanteConsul = $_SESSION['CuentadanteConsultado'];

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/admElementosValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa fa-pencil"></i> Editar Elementos
        <small>Edite aquí los Elementos del Sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Editar Elementos</li>
        <a href=" ">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
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

            <!--MUESTRA EL ERROR-->
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
            <!--/FIN DE MOSTRAR EL ERROR-->

            <div class="row">
                <!-- COLUMNA1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Placa</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nro. Placa" name="placa" value="<?php echo $elementoConsul->getPlaca() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Serial</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nro. Serial" name="serial" value="<?php echo $elementoConsul->getSerial() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Modelo" name="modelo" value="<?php echo $elementoConsul->getModelo() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Descripción</label>
                            <textarea class="form-control" placeholder="Descripción" name="descripcion" ><?php echo $elementoConsul->getDescripcion() ?></textarea>
                    </div>

                    <div class="form-group">
                        <label >Descripción Actual</label>                        
                            <textarea  class="form-control" placeholder="Descripción Actual" name="descripcion_actual" ><?php echo $elementoConsul->getDescripcion_actual() ?></textarea>
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
                            <input type="text" class="form-control pull-right" name="fecha_adquisicion" id="datepicker" value="<?php echo $elementoConsul->getFecha_adquisicion() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Valor Ingreso</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Valor Ingreso" name="valor_ingreso" value="<?php echo $elementoConsul->getValor_ingreso() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <div>
                            <select class="form-control" name="estado" value="<?php echo $elementoConsul->getEstado() ?>">
                                <option><?php echo $elementoConsul->getEstado() ?></option>
                                <option>Vigente</option>
                                <option>No Vigente</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cuentadante</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Cuentadante" name="cuentadante" value="<?php echo $cuentadanteConsul->getNro_doc() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info pull-right" name="btnedit">Editar <i class="fa fa fa-pencil"></i></button>
                    </div>
                </div>
                <!-- /.FIN COLUMNA2 -->
                <!--CAMPOS OCULTOS-->
                <input type="hidden" class="form-control"  name="id" value="<?php echo $elementoConsul->getId() ?>">
                <input type="hidden" class="form-control"  name="localizacion" value="<?php echo $elementoConsul->getLocalizacion() ?>"> 
                <input type="hidden" class="form-control"  name="funcionario_responsable" value="<?php echo $elementoConsul->getFuncionario_responsable()?>">
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
