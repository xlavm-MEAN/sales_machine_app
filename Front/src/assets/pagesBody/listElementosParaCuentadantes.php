<?php
//invoco el DTO antes de la session, para cuando se cree la sesion se tenga un DTO 
//donde almacenar los valores que se traigan del otro php
include_once '../_entidad/ElementoDto.php';

$title = 'Mis Elementos Asociados';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Cuentadante'){//validamos el inicio de sesión
    include_once '../pagesIncludes/menuCuentadantes.php'; 
}else{
     ?>
     <script>
         //se redirecciona a dicha pagina
         document.location.href = '../pagesIncludes/ObjetoNoEncontrado.php';
     </script>
     <?php
 }

$arrayC = $_SESSION['arrayElementos'];//obtiene el array que viene desde el controlador

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    <i class="fa fa-cubes"></i> Mis Elementos Asociados 
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Elementos Asociados</li>
        <a target='_blank' href="../img/ayuda/listElementosParaCuentadantes.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Lista de Elementos </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                    <!-- encabezado -->
                        <thead>
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Placa</th>
                                <th>Serial</th>
                                <th>Descripción</th>
                                <th>Descripción Actual</th>
                                <th>Fecha de Adquisición</th>
                                <th>valor</th>
                                <th>Ubicación Actual</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <?php foreach($arrayC as $array){?>
                                <tr>
                                <!--$array->item el item hace referencia al nombre del atributo item de la consulta la base de datos-->
                                    <td><a href="../_controlador/ElementoController.php?accion=consultar&subaccion=nada&placa=<?php echo $array->placa; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                    <td><?php echo $array->placa;?></td>
                                    <td><?php echo $array->serial; ?></td>
                                    <td><?php echo $array->descripcion; ?></td>
                                    <td><?php echo $array->descripcion_actual; ?></td>
                                    <td><?php echo $array->fecha_adquisicion; ?></td>
                                    <td><?php echo $array->valor_ingreso; ?></td>
                                    <td><?php echo $array->localizacion; ?></td>
                                    <td><?php echo $array->estado; ?></td>                                                    
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

