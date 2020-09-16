<?php
include_once '../_entidad/ConsumoDto.php';

$title = 'Préstamo del Consumo';
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

$consumoConsul = $_SESSION['consumoConsultado'];
$fecha_actual = date('m/d/Y'); 

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/realizarPrestValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa fa-cart-plus"></i> Realizar Préstamo del Consumo
        <small>Realice aquí el préstamo del Consumo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Préstar Consumo</li>
        <a target='_blank' href="../img/ayuda/realizarPrestConsumos.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>


<!-- FORMULARIO -->
<form method="post">
    <section class="content">
        <div class="box box-default">
            <!-- encabezado del formulario -->
            <div class="box-header with-border" Align="center">
                <h3 class="box-title">Datos del Consumo</h3>
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
                            <label >Item</label>
                            <div >
                                <input type="text" readonly="readonly" class="form-control" placeholder="Item" name="item" value="<?php echo $consumoConsul->getItem() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descripción</label>
                            <div >
                                <input type="text" readonly="readonly" class="form-control" placeholder="Descripción" name="descripcion" value="<?php echo $consumoConsul->getDescripcion() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tipo</label>
                            <div>
                                <select class="form-control" readonly="readonly" name="tipo" value="<?php echo $consumoConsul->getTipo() ?>">
                                    <!--para que muestre solo el valor que tiene-->
                                    <option><?php echo $consumoConsul->getTipo() ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Unidad Medida</label>
                            <div>
                                <select class="form-control" readonly="readonly" name="unidad_medida" value="<?php echo $consumoConsul->getUnidad_medida() ?>">                                    
                                    <!--para que muestre solo el valor que tiene-->
                                    <option><?php echo $consumoConsul->getUnidad_medida() ?></option>
                                </select>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label >Cantidad Total</label>
                            <div>
                                <input type="text" readonly="readonly" class="form-control" placeholder="Cantidad Total" name="cantidad_total" value="<?php echo $consumoConsul->getCantidad_total() ?>">
                            </div>
                        </div>

                    </div>
                    <!-- /.FIN COLUMNA1 -->
                    <!--COLUMNA2 -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label >Valor Unitario</label>
                            <div>
                                <input type="text" readonly="readonly" class="form-control" placeholder="Valor Unitario" name="valor_unit" value="<?php echo $consumoConsul->getValor_unit() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Valor Total</label>
                            <div>
                                <input type="text" readonly="readonly" class="form-control" placeholder="Valor Total" name="valor_total" value="<?php echo $consumoConsul->getValor_total() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Cantidad</label>
                            <div>
                                <input type="text" class="form-control" id= "cantidad_prestar" placeholder="Cantidad a Préstar" name="cantidad_prestar"value="<?php
                                if (isset($cantidad_prestar)) {
                                    echo $cantidad_prestar;
                                }
                                ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Observaciones</label>
                            <div>
                                <input type="text" class="form-control" id= "observaciones" placeholder="Observaciones" name="observaciones" value="<?php
                                if (isset($observaciones)) {
                                    echo $observaciones;
                                }
                                ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="btnprestConsumo" class="btn btn-info pull-right">Prestar<i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <!-- /.FIN COLUMNA2 -->
                    <!--CAMPO PARA EL ID-->
                    <input type="hidden" class="form-control"  name="id" id="id" value="<?php echo $consumoConsul->getId() ?>">
                </div>
            </div>
        </div>
    </section>
    </form>
<!-- FIN FORMULARIO -->

<?php
include_once '../pagesIncludes/footer.php';
?>

