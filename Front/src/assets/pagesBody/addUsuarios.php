<?php

$title = 'Agregar Usuario';
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

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/admUsuariosValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa-plus-circle text-green"></i> Agregar Usuario
        <small>Agregue aquí los Usuarios de Sistema</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Agregar Usuario</li>
        <a target='_blank' href="../img/ayuda/addUsuarios.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
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

               <!--MOSTRAR EL ERROR-->
               <?php
                if (isset($error)) {
                    ?>
                    <div class="form-group has-error">
                        <label class="control-label" for="inputError">
                            <i class="fa fa-times-circle-o"></i> <?php echo $error; ?></label>
                    </div>                            
                    <?php }
                ?>
                <!--/MOSTRAR EL ERROR-->

            <div class="row">
                <!-- COLUMNA1 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label >Nro. Documento</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nro. Documento" name="nro_doc" value="<?php
                                //si ha sido seteado el item entonces muestre el item (si se ha escrito algo), esto para mantener los datos
                                if (isset($nro_doc)) {
                                    echo $nro_doc;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Nombres</label>
                        <div >
                            <input type="text" class="form-control" placeholder="Nombres" name="nombres" value="<?php
                                if (isset($nombres)) {
                                    echo $nombres;
                                }
                                ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Apellidos" name="apellidos" value="<?php
                            if (isset($apellidos)) {
                                echo $apellidos;
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Teléfono</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Teléfono" name="telefono" value="<?php
                            if (isset($telefono)) {
                                echo $telefono;
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label >Correo</label>
                        <div>
                            <input type="text" class="form-control" placeholder=" Dirección de Correo Electrónico" name="correo" value="<?php
                            if (isset($correo)) {
                                echo $correo;
                            }
                            ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Dirección</label>
                        <div>
                            <input type="text" class="form-control" placeholder="Dirección" name="direccion" value="<?php
                            if (isset($direccion)) {
                                echo $direccion;
                            }
                            ?>">
                        </div>
                    </div>
                </div>
                <!-- /.FIN COLUMNA1 -->
                <!--COLUMNA2 -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tipo Usuario</label>
                        <div>
                            <select class="form-control" name="tipo_usuario" value="<?php
                            if (isset($tipo_usuario)) {
                                echo $tipo_usuario;
                            }
                            ?>">
                                
                                <option>Funcionario</option>
                                <option>Portero</option>
                                <option>Administrador</option>
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Usuario</label>
                            <div>
                                <input type="text" class="form-control" placeholder="Usuario" name="usuario" value="<?php
                            if (isset($usuario)) {
                                echo $usuario;
                            }
                            ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <div>
                                <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <div>
                                <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="confirmar_contrasena">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <div>
                                <select class="form-control" name="estado" value="<?php
                            if (isset($estado)) {
                                echo $estado;
                            }
                            ?>">
                                    <option>Vigente</option>
                                    <option>No Vigente</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Cancelar <i class="fa fa-remove"></i></button>
                            <button type="submit" class="btn btn-info pull-right" name="btnadd">Agregar <i class="fa fa fa-plus"></i></button>
                        </div>
                    </div>
                    <!-- /.FIN COLUMNA2 -->
                        <!--CAMPO PARA EL ID-->
                        <input type="hidden" class="form-control"  name="id" value="<?php
                           if (isset($id)) {
                               echo $id;
                           }
                           ?>">
                </div>
            </div>
        </div>
    </div>
</section>
</form>
<!-- FIN FORMULARIO -->

<?php

include_once '../pagesIncludes/footer.php';
?>