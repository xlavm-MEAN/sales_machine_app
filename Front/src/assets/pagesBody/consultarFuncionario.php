<?php

$title = 'Consultar Funcionario';
include_once '../pagesIncludes/header.php';
if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Administrador'){//validamos el inicio de sesión
   include_once '../pagesIncludes/menuAdministrador.php'; 
   
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

//INVOCO AL SCRIPT QUE VALIDA Y QUE REDIRECCIONA AL CONTROLADOR
include_once "../_validaciones/ConsultarUsuariosValidar.php";
?>

<section class="content-header">
    <h1>
    <i class="fa fa-search"></i> Consultar Funcionario
        <small>Consultar por Número de Documento del Funcionario</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=" "><i class="fa fa fa-home"></i> Inicio</a></li>
        <li class="active">Consultar Funcionario</li>
        <a target='_blank' href="../img/ayuda/consultarFuncionario.jpg" imageanchor="1" style="margin-left: auto; margin-right: auto;">  |  <i class="fa fa-question-circle text-blue "></i> Ayuda</a>
    </ol>
</section>


<!-- FORMULARIO -->
<form method="post">
<section class="content">
    <div class="box box-default">

        <!-- encabezado del formulario -->
        <div class="box-header with-border" Align="center">
            <h3 class="box-title">Consulte el Funcionario</h3>
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
                                    <label >Nro. Documento</label>
                                    <div >
                                        <input type="text" class="form-control" placeholder="Nro. Documento" name="nro_doc">
                                    </div>
                                    <div><br>
                                        <!--capturo la accion-->
                                        <input type="hidden" class="form-control" name="accion" value="<?php echo ($_GET['accion'])?>">
                                        <input type="hidden" class="form-control" name="locPortero" value="<?php echo ($_GET['locPortero'])?>">
                                        <button type="submit" name="btnconsultar"class="btn btn-info pull-right">Consultar Funcionario <i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.FIN COLUMNA1 -->
                        </div>
                    </div>

                    <!--con esto centro el formulario-->
                </div>
            </div>
        </div>
        <!--/con esto centro el formulario-->

    </div>
</section>
</form>
<!-- FIN FORMULARIO -->

<?php

include_once '../pagesIncludes/footer.php';
?>