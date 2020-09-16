<?php
//invoco el DTO antes de la session, para cuando se cree la sesion se tenga un DTO 
//donde almacenar los valores que se traigan del otro php
include_once '../_entidad/UsuarioDto.php';

$title = 'Mantenimiento | Usuarios';
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

$arrayC = $_SESSION['arrayUsuarios'];//obtiene el array que viene desde el controlador

?>

<!-- encabezado de la pagina -->
<section class="content-header">
    <h1>
    <i class="fa fa fa-users"></i> Mantenimiento de Usuarios <?php echo ($_SESSION['tipo']);?>
        <small>Consulte aquí los Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Lista Usuarios</li>
        <a target='_blank' href="../img/ayuda/listUsuarios.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>

<!-- CONTENIDO -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <!-- box-header -->
                <div class="box-header">
                    <h3 class="box-title">Lista de Usuarios <?php echo ($_SESSION['tipo']);?></h3>
                </div>
                <!-- /.box-header -->
                <!-- TABLA -->
                <div class="box-body table-responsive no-padding">
                    <table id="example1" class="table table-bordered table-striped">
                        <!-- encabezado -->
                        <thead>
                            <tr>
                                <th><i class="fa fa-eye"></i></th>
                                <th>Nro. Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Tipo de Usuario</th>    
                                <th>Estado</th>
                                <th> <i class="fa fa-pencil"></i></th>                              
                                <th><i class="fa fa-remove"></i></th>    
                            </tr>
                        </thead>
                        <!-- cuerpo -->
                        <tbody>
                            <?php foreach($arrayC as $array){?>
                                <tr>
                                <!--$array->nro_doc el nro_doc hace referencia al nombre del atributo nro_doc de la base de datos-->
                                    <td><a href="../_controlador/UsuarioController.php?accion=consultar&subaccion=visualizar&nro_doc=<?php echo $array->nro_doc; ?>" class="small-box-footer"> <i class="fa fa-eye"></i></a></td>
                                    <td><?php echo $array->nro_doc;?></td>
                                    <td><?php echo $array->nombres; ?></td>
                                    <td><?php echo $array->apellidos; ?></td>
                                    <td><?php echo $array->telefono; ?></td>
                                    <td><?php echo $array->correo; ?></td>
                                    <td><?php echo $array->direccion; ?></td> 
                                    <td><?php echo $array->tipo_usuario; ?></td> 
                                    <td><?php echo $array->estado; ?></td>                                   
                                    <td><a href="../_controlador/UsuarioController.php?accion=consultar&subaccion=edit&nro_doc=<?php echo $array->nro_doc; ?>" class="small-box-footer"> <i class="fa fa-pencil"></i></a></td>
                                    <td><a href="../_controlador/UsuarioController.php?accion=eliminar&nro_doc=<?php echo $array->nro_doc; ?>" class="small-box-footer"><i class="fa fa-remove"></i></a></td>
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

