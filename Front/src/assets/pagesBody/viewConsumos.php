<?php
include_once '../_entidad/ConsumoDto.php';

$title = 'Consumo';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Administrador'){//validamos el inicio de sesión
   include_once '../pagesIncludes/menuAdministrador.php'; 
   
}else if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Funcionario'){//cierre de la validación de inicio de sessión
    include_once '../pagesIncludes/menuFuncionarios.php';
}else if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Cuentadante'){//cierre de la validación de inicio de sessión
    include_once '../pagesIncludes/menuCuentadantes.php';
}else if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Portero'){//cierre de la validación de inicio de sessión
    include_once '../pagesIncludes/menuPorteros.php';
}else{
    ?>
    <script>
        //se redirecciona a dicha pagina
        document.location.href = '../pagesIncludes/ObjetoNoEncontrado.php';
    </script>
    <?php
}

$consumoConsul = $_SESSION['consumoConsultado'];

?>

<section class="content-header">
    <h1>
    <i class="fa fa fa-eye"></i> Visualizar Consumo
        <small>Visualice aquí el Consumo</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Visualizar Consumo</li>
        <a href=" ">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol><br>
</section>


<!-- FORMULARIO -->
<form method="post" action =" ">
    <section class="content">
        <div class="box box-default">
            <!-- encabezado del formulario -->
            <div class="box-header with-border" Align="center">
                <h3 class="box-title">Datos del Consumo</h3>
            </div>
            <!-- fin encabezado del formulario -->
            <div class="box-body">
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
                                <select class="form-control" readonly="readonly" name="tipo"value="<?php echo $consumoConsul->getTipo() ?>">
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

                    </div>
                    <!-- /.FIN COLUMNA1 -->
                    <!--COLUMNA2 -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label >Cantidad Total</label>
                            <div>
                                <input type="text" readonly="readonly" class="form-control" placeholder="Cantidad Total" name="cantidad_total" value="<?php echo $consumoConsul->getCantidad_total() ?>">
                            </div>
                        </div>

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
