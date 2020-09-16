<?php
//invoco el DTO antes de la session, para cuando se cree la sesion se tenga un DTO 
//donde almacenar los valores que se traigan del otro php
include_once '../_entidad/ElementoDto.php';
include_once '../_entidad/ConsumoDto.php';

$title = 'Préstamos | Portero';
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

$arrayE = $_SESSION['arrayPrestElemPortENTRADA'];//obtiene el array que viene desde el controlador
$arrayS = $_SESSION['arrayPrestElemPortSALIDA'];//obtiene el array que viene desde el controlador
$fecha_actual = date('m/d/Y'); 

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <i class="fa fa-shopping-cart"></i> Préstamos
        <small>Visualice Aquí los Préstamos que van de entrada o salida</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Préstamo</li>
        <a target='_blank' href="../img/ayuda/listElementosPrestadosPortero.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>

<!-- CONTENIDO ELEMENTOS DE ENTRADA -->
<form method="post">
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <i class="fa fa-sign-in"></i> <h3 class="box-title">Lista de Préstamos de Entrada</h3>                    
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead >
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Placa</th>
                                <th>Fecha del Préstamo</th>
                                <th>Destino Final</th>
                                <th>Localización  <i class="fa fa-map-marker"></i></th>
                                <th>Control</th>
                                <th style="display:none;"></th>                               
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <tbody>
                        <?php foreach($arrayE as $array){?>
                            <!--$array->item el item hace referencia al nombre del atributo item de la consulta la base de datos-->
                            <tr>
                                <td><a href="../_controlador/ElementoController.php?accion=consultar&subaccion=nada&placa=<?php echo $array->placa; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                <td><?php echo $array->placa;?></td>
                                <td><?php echo $array->fecha_prestamo; ?></td>
                                <td><?php echo $array->destino; ?></td>
                                <td><?php echo $array->destino_final; ?></td>
                                <!--oculto la columna y el campo que contiene el id del elemento-->
                                <td style="display:none;"><input type="hidden" class="form-control" name="placa" id="placa" value="<?php echo $array->placa; ?>"></td>                                 
                                <td><a href="../_controlador/PrestamoElementoController.php?accion=actualizarLocalizacionPORTERO&placa=<?php echo ($array->placa) ?>&destino=<?php echo ($_SESSION['localizacionPortero']) ?>&subaccion=<?php echo ($_GET['subaccion'])?>&idFuncionario=<?php echo ($array->funcionario) ?>" class="small-box-footer">Entrada <i class="fa fa-sign-in"></i></a></td>                    
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
<!-- /.CONTENIDO ELEMENTOS ENTRADA-->



<!-- CONTENIDO ELEMENTOS DE SALIDA -->
<form method="post">
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                <i class="fa fa-sign-out"></i>  <h3 class="box-title">Lista de Préstamos de Salida</h3>               
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead >
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Placa</th>
                                <th>Fecha del Préstamo</th>
                                <th>Destino Final</th>
                                <th>Localización <i class="fa fa-map-marker"></i></th>
                                <th>Control</th>
                                <th style="display:none;"></th>                               
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <tbody>
                        <?php foreach($arrayS as $array){?>
                            <!--$array->item el item hace referencia al nombre del atributo item de la consulta la base de datos-->
                            <tr>
                                <td><a href="../_controlador/ElementoController.php?accion=consultar&subaccion=nada&placa=<?php echo $array->placa; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                <td><?php echo $array->placa;?></td>
                                <td><?php echo $array->fecha_prestamo; ?></td>
                                <td><?php echo $array->destino; ?></td>
                                <td><?php echo $array->destino_final; ?></td>
                                <!--oculto la columna y el campo que contiene el id del elemento-->
                                <td style="display:none;"><input type="hidden" class="form-control" name="placa" id="placa" value="<?php echo $array->placa; ?>"></td>                                 
                                <td><a href="../pagesBody/marcarDestinoPortero.php?placa=<?php echo $array->placa; ?>&subaccion=<?php echo ($_GET['subaccion'])?>&idFuncionario=<?php echo $array->funcionario; ?>" class="small-box-footer">Salida <i class="fa fa-sign-out"></i></a></td>
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
<!-- /.CONTENIDO ELEMENTOS SALIDA-->


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

