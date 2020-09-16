<?php
include_once '../_entidad/ElementoDto.php';
include_once '../_entidad/UsuarioDto.php';
session_start();
$elementoConsul = $_SESSION['ElementoConsultado'];//recibe un array con los datos del elemento y 

$title = 'Elemento';
include_once '../pagesIncludes/header.php';
include_once '../pagesIncludes/menuAdministrador.php';
?>

<section class="content-header">
    <h1>
        Visualizar Elementos
        <small>Visualice aquí los Elementos del Sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Visualizar Elementos</li>
        <a href=" ">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol><br>
</section>


<!-- FORMULARIO -->
<form method="post" action =" ">
<section class="content">
    <div class="box box-default">
        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
            <h3 class="box-title">Datos del Elemento</h3>
        </div>
        <!-- fin encabezado del formulario -->
        <div class="box-body">
            <div class="row">
                <!-- COLUMNA1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Placa</label>
                        <div >
                            <input type="text" readonly="readonly" class="form-control" placeholder="Nro. Placa" name="placa" value="<?php echo $elementoConsul->getPlaca() ?>">
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
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Descripción" name="descripcion" value="<?php echo $elementoConsul->getDescripcion() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Descripción Actual</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Descripción Actual" name="descripcion_actual" value="<?php echo $elementoConsul->getDescripcion_actual() ?>">
                        </div>
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

                    <div class="form-group">
                        <label>Funcionario Responsable</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Funcionario Responsable" name="funcionario_responsable" value="<?php echo ($funcionarioConsul->getNombres(). " " .$funcionarioConsul->getApellidos() )?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nro. Documento Responsable</label>
                        <div>
                            <input type="text" readonly="readonly" class="form-control" placeholder="Funcionario Responsable" name="funcionario_responsable" value="<?php echo ($funcionarioConsul->getNro_doc())?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Cancelar <i class="fa fa-remove"></i></button>
                        <button type="submit" class="btn btn-info pull-right">Ir a Inicio<i class="fa fa-shopping-cart"></i></button>
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
