<?php
//invoco el DTO antes de la session, para cuando se cree la sesion se tenga un DTO 
//donde almacenar los valores que se traigan del otro php
include_once '../_entidad/Prestamo_ConsumoDto.php';

$title = 'Consumos | Préstados';
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

$arrayC = $_SESSION['arrayPrestConsumos'];//obtiene el array que viene desde el controlador

?>

<!-- encabezado de la pagina -->
<section class="content-header">
    <h1>
    <i class="fa fa-pie-chart"></i> Consumos <?php echo ($_SESSION['tipo']);?>
        <small>Consulte aquí los Consumos Prestados</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Préstamos de Consumos</li>
        <a target='_blank' href="../img/ayuda/listPrestConsumos.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Lista de Consumos <?php echo ($_SESSION['tipo']);?></h3>
                </div>
                <!-- /.box-header -->
                <!-- TABLA -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                        <!-- encabezado -->
                        <thead>
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Item</th>
                                <th>Funcionario</th>
                                <th>Unidad de Medida</th>
                                <th>Cantidad Prestada</th>
                                <th>Fecha del Préstamo</th>
                                <th>Tipo</th>
                                <th>Fecha de devolución</th>    
                                <th>Observaciones</th>                              
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <tbody>
                            <?php foreach($arrayC as $array){?>
                                <tr>
                                <!--$array->item el item hace referencia al nombre del atributo item de la base de datos-->
                                    <td><a href="../_controlador/ConsumoController.php?accion=consultar&subaccion=visualizar&item=<?php echo $array->item; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                    <td><?php echo $array->item;?></td>
                                    <td><?php echo $array->funcionario; ?></td>
                                    <td><?php echo $array->unidad_medida; ?></td>
                                    <td><?php echo $array->cantidad; ?></td>
                                    <td><?php echo $array->fecha_prestamo; ?></td>
                                    <td><?php echo $array->tipo; ?></td>    
                                    <td><?php echo $array->fecha_devolucion; ?></td> 
                                    <td><?php echo $array->observaciones; ?></td>                                              
                                </tr>                    
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                  <!-- /TABLA -->
            </div>
        </div>
    </div>
</section>
<!-- /CONTENDIO -->

<?php
include_once '../pagesIncludes/footer.php';
?>

<!-- Script para DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- Script para lenguaje de DataTables -->
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
