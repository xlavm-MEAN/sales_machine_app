<?php
include_once '../_entidad/ElementoDto.php';
include_once '../_entidad/UsuarioDto.php';

$title = 'Préstamo del Elemento';
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

$elementoConsul = $_SESSION['ElementoConsultado'];//recibe un array con los datos del elemento y 
$cuentadanteConsul = $_SESSION['CuentadanteConsultado'];
$fecha_actual = date('m/d/Y'); 


//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/realizarPrestValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa fa-cart-plus"></i> Realizar Préstamo del Elemento
        <small>Realice aquí el prestamo del elemento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Préstar Elemento</li>
        <a href=" ">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
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
                <?php }?>
                <!--/MOSTRAR EL ERROR-->

            <div class="row">
                <!-- COLUMNA1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Placa</label>
                        <div >
                            <input type="text" readonly="readonly" class="form-control" placeholder="Nro. Placa" name="placa" value="<?php echo $elementoConsul->getPlaca() ?>" id="placa">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>serial</label>
                        <div >
                            <input type="text" readonly="readonly" class="form-control" placeholder="Nro. Serial" name="serial" value="<?php echo $elementoConsul->getSerial() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Modelo</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Modelo" name="modelo" value="<?php echo $elementoConsul->getModelo() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Descripción</label>
                            <textarea class="form-control" placeholder="Descripción" name="descripcion" disabled><?php echo $elementoConsul->getDescripcion() ?></textarea>
                    </div>

                    <div class="form-group">
                        <label >Descripción Actual</label>                        
                            <textarea  class="form-control" placeholder="Descripción Actual" name="descripcion_actual" disabled><?php echo $elementoConsul->getDescripcion_actual() ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Fecha del Adquisición</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" readonly="readonly" class="form-control pull-right" name="fecha_adquisicion" id="datepicker" value="<?php echo $elementoConsul->getFecha_adquisicion() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Valor Ingreso</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Valor Ingreso" name="valor_ingreso" value="<?php echo $elementoConsul->getValor_ingreso() ?>">
                        </div>
                    </div>

                </div>
                <!-- /.FIN COLUMNA1 -->
                <!--COLUMNA2 -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Estado</label>
                        <div>
                            <select class="form-control" readonly="readonly" name="estado" value="<?php echo $elementoConsul->getEstado() ?>">
                                <!--para que muestre solo el valor que tiene-->
                                <option><?php echo $elementoConsul->getEstado() ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Cuentadante</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Cuentadante" name="cuentadante" value="<?php echo ($cuentadanteConsul->getNombres(). " " .$cuentadanteConsul->getApellidos()) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nro Documento Cuentadante</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Cuentadante" name="cuentadante" value="<?php echo ($cuentadanteConsul->getNro_doc()) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Localización</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Localización" name="localzacion" value="<?php echo $elementoConsul->getLocalizacion() ?>">
                        </div>
                    </div>

                    <!--cada vez que cambie el select, se asigne un valor al text mediante onchange-->
                    <div class="form-group">
                        <label >Seleccione Destino</label>
                        <div>
                            <select class="form-control" name="select_destino" id="select_destino" onchange="obtenerDestino();">
                                    <option value="">Otro</option>
                                    <option value="Rafael Roldán">Rafael Roldán</option>
                                    <option value="CFMA">CFMA</option>                        
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Otro</label>
                        <div>
                            <input type="text" class="form-control" name="destino" id="destino">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Cancelar <i class="fa fa-remove"></i></button>
                        <button type="submit" name="btnprestElemento" class="btn btn-info pull-right">Prestar<i class="fa fa-shopping-cart"></i></button>                        
                    </div>
                </div>
                <!-- /.FIN COLUMNA2 -->
                <!--CAMPO PARA EL ID-->
                <input type="hidden" class="form-control"  name="id" value="<?php echo $elementoConsul->getId() ?>">
            </div>
        </div>
    </div>
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