<?php
include_once '../_entidad/ConsumoDto.php';

$title = 'Editar Consumo';
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

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/admConsumosValidar.php";
?>


<section class="content-header">
    <h1>
    <i class="fa fa fa-pencil"></i> Editar Consumos
        <small>Edite aquí los Consumos del Sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Editar Consumos</li>
        <a href=" ">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol><br>
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

                <!--MUESTRA EL ERROR-->
                <?php
                if (isset($error)) {
                    ?>
                    <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o"></i> <?php echo $error; ?></label>
                    </div>                            
                    <?php }
                ?>
                <!--/FIN DE MOSTRAR EL ERROR-->


                <div class="row">
                    <!-- COLUMNA1 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Item</label>
                            <div >
                                <input type="text" class="form-control" placeholder="Item" name="item" value="<?php echo $consumoConsul->getItem() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descripción</label>
                            <div >
                                <input type="text" class="form-control" placeholder="Descripción" name="descripcion" value="<?php echo $consumoConsul->getDescripcion() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tipo</label>
                            <div>
                                <select class="form-control" name="tipo"value="<?php echo $consumoConsul->getTipo() ?>">
                                    <!--para cuando se edite aparezca primero el valor que ya tenía-->
                                    <option><?php echo $consumoConsul->getTipo() ?></option>
                                    <option>Controlado</option>   
                                    <option>No Controlado</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Unidad Medida</label>
                            <div>
                                <select class="form-control" name="unidad_medida" value="<?php echo $consumoConsul->getUnidad_medida() ?>">
                                    <!--para cuando se edite aparezca primero el valor que ya tenía-->
                                    <option><?php echo $consumoConsul->getUnidad_medida() ?></option>                                    
                                    <option>Milímetros</option>
                                    <option>Centímetros</option>
                                    <option>Pulgadas</option>
                                    <option>Pies</option>
                                    <option>Yardas</option>
                                    <option>Centímetros</option>
                                    <option>Metros</option>
                                    <option>Kilómetros</option>
                                    <option>Miligramos</option>
                                    <option>Gramos</option>
                                    <option>Kilogramos</option>
                                    <option>Toneladas</option>
                                    <option>Unidades</option>
                                    <option>Galones</option>
                                    <option>Litros</option>
                                    <option>Centímetros Cúbicos</option>
                                    <option>Metros Cúbicos</option>
                                    <option>Kilómetros Cúbicos</option>
                                    <option>Paquetes</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <!-- /.FIN COLUMNA1 -->
                    <!--COLUMNA2 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Cantidad Total</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Cantidad Total" name="cantidad_total" value="<?php echo $consumoConsul->getCantidad_total() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Valor Unitario</label>
                            <div>
                                <input type="text" class="form-control" id= "valor_unit" onChange="calculo(this.value,cantidad_total.value,valor_total);" placeholder="Valor Unitario" name="valor_unit" value="<?php echo $consumoConsul->getValor_unit() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label >Valor Total</label>
                            <div>
                                <input type="text" class="form-control" id= "valor_total" placeholder="Valor Total" name="valor_total" value="<?php echo $consumoConsul->getValor_total() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info pull-right" name="btnedit">Editar <i class="fa fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <!-- /.FIN COLUMNA2 -->
                    <!--CAMPO PARA EL ID-->
                    <input type="hidden" class="form-control"  name="id" value="<?php echo $consumoConsul->getId() ?>">
                </div>
            </div>
        </div>
    </section>
</form>
<!-- FIN FORMULARIO -->

<?php
include_once '../pagesIncludes/footer.php';
?>

<!--Script que calcula el valor total-->
<script>
    /**
    * Funcion que se ejecuta cada vez que se añade una letra en un cuadro de texto
    * multiplica los valores de los cuadros de texto
    */
    function calculo(valor_unit,cantidad_total,valor_total){
        // Calculo del subtotal
        total = eval(valor_unit)*eval(cantidad_total);
        valor_total.value=total;
    }
</script>