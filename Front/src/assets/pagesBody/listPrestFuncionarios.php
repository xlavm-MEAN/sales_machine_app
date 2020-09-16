<?php
//invoco el DTO antes de la session, para cuando se cree la sesion se tenga un DTO 
//donde almacenar los valores que se traigan del otro php
include_once '../_entidad/ElementoDto.php';
include_once '../_entidad/ConsumoDto.php';


 $title = 'Préstamos | Funcionario';
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

$arrayE = $_SESSION['arrayElementosPrest'];//obtiene el array que viene desde el controlador
$arrayC = $_SESSION['arrayConsumosPrest'];
$funcionario = $_SESSION['funcionario'];
$idFuncionario = $_SESSION['idfuncionario'];
$fecha_actual = date('m/d/Y'); 
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <i class="fa fa-shopping-cart"></i> Lista de Préstamos del Funcionario <?php echo($funcionario)?>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Préstamos del Funcionario</li>
        <a target='_blank' href="../img/ayuda/listPrestFuncionarios.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>


<!-- CONTENIDO ELEMENTOS-->
<form method="post">
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <i class="fa fa-industry"></i> <h3 class="box-title">Lista de Elementos Prestados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead >
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Placa</th>
                                <th>Serial</th>
                                <th>Modelo</th>
                                <th>Descripción</th>
                                <th>Descripción Actual</th>
                                <th style="display:none;"></th>
                                <th><i class="fa fa-cart-arrow-down"></i></th>
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <tbody>
                        <?php foreach($arrayE as $array){?>
                            <!--$array->item el item hace referencia al nombre del atributo item de la consulta la base de datos-->
                            <tr>
                                <td><a href="../_controlador/ElementoController.php?accion=consultar&subaccion=nada&placa=<?php echo $array->placa; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                <td><?php echo $array->placa;?></td>
                                <td><?php echo $array->serial; ?></td>
                                <td><?php echo $array->modelo; ?></td>
                                <td><?php echo $array->descripcion; ?></td>
                                <td><?php echo $array->descripcion_actual; ?></td>
                                <!--oculto la columna y el campo que contiene el id del elemento-->
                                <td style="display:none;"><input type="hidden" class="form-control" name="placa" id="placa" value="<?php echo $array->placa; ?>"></td> 
                                <td><a href="../_controlador/PrestamoElementoController.php?accion=devolver&placa=<?php echo $array->placa; ?>&fecha=<?php echo ($fecha_actual)?>&idFuncionario=<?php echo ($idFuncionario)?>"  class="small-box-footer"><i class="fa fa-cart-arrow-down"></i></a></td>               
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<!-- /.CONTENIDO ELEMENTOS-->

<!-- CONTENIDO CONSUMOS-->
<form method="post">
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <i class="fa fa-pie-chart"></i> <h3 class="box-title">Lista de Consumos Prestados</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead >
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Item</th>
                                <th>Fecha del Préstamo</th>
                                <th>Cantidad</th>
                                <th>Unidad de Medida</th>
                                <th>Tipo</th>
                                <th style="display:none;"></th>
                                <th><i class="fa fa-cart-arrow-down"></i></th>
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <tbody>
                        <?php foreach($arrayC as $array){?>
                            <!--$array->item el item hace referencia al nombre del atributo item de la consulta la base de datos-->
                            <tr>
                                <td><a href="../_controlador/ConsumoController.php?accion=consultar&subaccion=visualizar&item=<?php echo $array->item; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                <td><?php echo $array->item;?></td>
                                <td><?php echo $array->fecha_prestamo; ?></td>
                                <td><?php echo $array->cantidad; ?></td>
                                <td><?php echo $array->unidad_medida; ?></td>
                                <td><?php echo $array->tipo; ?></td>
                                <!--oculto la columna y el campo que contiene el id del consumo-->
                                <td style="display:none;"><input type="hidden" class="form-control" name="idConsumo" id="idConsumo" value="<?php echo $array->id; ?>"></td> 
                                <td><a href="../_controlador/PrestamoConsumoController.php?accion=devolver&tipo=<?php echo $array->tipo; ?>&fecha=<?php echo ($fecha_actual)?>&item=<?php echo $array->item; ?>&cantidad=<?php echo $array->cantidad; ?>&idFuncionario=<?php echo ($idFuncionario)?>" class="small-box-footer"><i class="fa fa-cart-arrow-down"></i></a></td>                                            
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<!-- /.CONTENIDO CONSUMOS-->


<?php
include_once '../pagesIncludes/footer.php';
?>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable({
            //cambiar el lenguaje a español forma 1
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar: ",
                "zeroRecords": "No hay Registros encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>

<!-- page script -->
<script>
    $(function () {
        $("#example2").DataTable({
            //cambiar el lenguaje a español forma 1
            "language": {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 Registros",
                "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Registros",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar: ",
                "zeroRecords": "No hay Registros encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>
