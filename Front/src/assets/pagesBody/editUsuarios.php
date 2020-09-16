<?php
include_once '../_entidad/UsuarioDto.php';

$title = 'Editar Usuario';
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

$usuarioConsul = $_SESSION['UsuarioConsultado'];

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/admUsuariosValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa fa-pencil"></i> Editar Usuario
        <small>Edite aquí los datos de los Usuarios del Sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Edite Usuario</li>
        <a href=" ">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol><br>
</section>


<!-- FORMULARIO -->
<form method="post">
<section class="content">
    <div class="box box-default">
        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
            <h3 class="box-title">Datos del Usuario</h3>
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
                        <label >Nro. Documento</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nro. Documento" name="nro_doc" value="<?php echo $usuarioConsul->getNro_doc() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nombres</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="<?php echo $usuarioConsul->getNombres() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="<?php echo $usuarioConsul->getApellidos() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Teléfono</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Teléfono" name="telefono" value="<?php echo $usuarioConsul->getTelefono() ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Correo</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Correo" name="correo" value="<?php echo $usuarioConsul->getCorreo() ?>">
                        </div>
                    </div>

                </div>
                <!-- /.FIN COLUMNA1 -->
                <!--COLUMNA2 -->
                <div class="col-md-6">
                    <div class="form-group">

                        <div class="form-group">
                            <label>Dirección</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="<?php echo $usuarioConsul->getDireccion() ?>">
                            </div>
                        </div>

                        <label>Tipo Usuario</label>
                        <div>
                            <select class="form-control" name="tipo_usuario" value="<?php echo $usuarioConsul->getTipo_usuario() ?>">
                                <!--para cuando se edite aparezca primero el valor que ya tenía-->
                                <option><?php echo $usuarioConsul->getTipo_usuario() ?></option>            
                                <option>Funcionario</option>
                                <option>Portero</option>
                                <option>Administrador</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Usuario</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Usuario" name="usuario" value="<?php echo $usuarioConsul->getUsuario() ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <select class="form-control" name="estado" value="<?php echo $usuarioConsul->getEstado() ?>">
                                    <option><?php echo $usuarioConsul->getEstado() ?></option>
                                    <option>Vigente</option>
                                    <option>No Vigente</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-info pull-right" name="btnedit">Editar <i class="fa fa fa-pencil"></i></button>
                        </div>
                    </div>
                    <!-- /.FIN COLUMNA2 -->
                    <!--CAMPO PARA EL ID-->
                    <input type="hidden" class="form-control"  name="id" value="<?php echo $usuarioConsul->getId() ?>">
                </div>
            </div>
        </div>
</section>
</form>
<!-- FIN FORMULARIO -->

<?php

include_once '../pagesIncludes/footer.php';
?>