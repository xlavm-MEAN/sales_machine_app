<?php

$title = 'Cambiar Contraseña';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Funcionario'){//validamos el inicio de sesión
   include_once '../pagesIncludes/menuFuncionarios.php';    
}else if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Cuentadante'){//cierre de la validación de inicio de sessión
    include_once '../pagesIncludes/menuCuentadantes.php';
}else if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Portero'){//cierre de la validación de inicio de sessión
    include_once '../pagesIncludes/menuPorteros.php';
}else if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Administrador'){//cierre de la validación de inicio de sessión
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
include_once "../_validaciones/cambiarContraValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa-asterisk"></i> Cambiar Contraseña
        <small>Cambie aquí su contraseña</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Cambiar Contraseña</li>
        <a target='_blank' href="../img/ayuda/cambiarContra.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>


<!-- FORMULARIO -->
<form method="post">
<section class="content">
    <div class="box box-default">

        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
         <h3 class="box-title">Cambie su Contraseña</h3>
        </div>
        <!-- fin encabezado del formulario -->

        <!--con esto centro el formulario-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <!--/con esto centro el formulario-->

                    <div class="box-body">
                        <div class="row">
                            <!-- COLUMNA1 -->
                            <div class="col-md-10">

                                
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


                        <div class="form-group">
                            <label>Contraseña Actual</label>
                            <div>
                                <input type="password" class="form-control" placeholder="Contraseña Actual" name="contrasena_actual">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                            <div>
                                <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Confirmar Contraseña </label>
                            <div>
                                <input type="password" class="form-control" placeholder="Confirmar Contraseña" name="confirmar_contrasena">
                            </div>
                        </div>

                                    <br>
                                        <!--capturo la accion-->
                                        <input type="hidden" class="form-control" name="id" value="<?php echo ($_SESSION['usuarioLogin']->getId())?>">
                                        <button type="submit" name="btncambiar"class="btn btn-info pull-right">Cambiar Contraseña <i class="fa fa-pencil"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.FIN COLUMNA1 -->
                        </div>
                    </div>

                    <!--con esto centro el formulario-->
                </div>
            </div>
        <!--/con esto centro el formulario-->
</section>
</form>
<!-- FIN FORMULARIO -->

<?php

include_once '../pagesIncludes/footer.php';
?>