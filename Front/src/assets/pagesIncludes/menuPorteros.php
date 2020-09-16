<!--MENU DE LA PAGINA..................................................................................-->
<aside class="main-sidebar">
    <section class="sidebar">
        <!-- ESCRIPCION DEL USUARIO -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../img/usuarios/avatar.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo ($_SESSION['usuarioLogin']->getNombres()." ".$_SESSION['usuarioLogin']->getApellidos()) //nombre del usuario en menú?></p>
                <a><i class="fa fa-map-marker text-success "></i><?php echo ($_SESSION['localizacionPortero'])?></a>
            </div>
        </div>
        <!--/DESCRIPCION DEL USUARIO -->

        <!-- BARRA OSCURA "BARRA DE NAVEGACION" -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">BARRA DE NAVEGACIÓN</li>

            <li>
                <a href="../_controlador/redireccionaAIndex.php">
                    <i class="fa fa-home"></i> <span>Inicio</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>
            
            <li>
                <a href="../pagesBody/consultarFuncionario.php?accion=consultarPrestParaPortero&locPortero=<?php echo ($_SESSION['localizacionPortero'])?>">
                    <i class="fa fa-search "></i>  <span>Consultar Usuarios</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            <li>
                <a href="../_controlador/PrestamoElementoController.php?accion=mostrarPrestParaPortero&subaccion=visualizar&locPortero=<?php echo ($_SESSION['localizacionPortero'])?>">
                <i class="fa fa-industry"></i> <span>Visualizar Elementos </span>
                <span class="pull-right-container"></span>
                </a>
            </li>


           
            <li class="header">CONFIGURACIÓN</li>

            <li>
                <a href="../_controlador/UsuarioController.php?accion=consultar&subaccion=modificarDatos&nro_doc=<?php echo ($_SESSION['usuarioLogin']->getNro_doc()); ?>">
                    <i class="fa fa-cogs"></i> <span>Actualice sus Datos</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

            <li>
                <a href="cambiarContra.php">
                    <i class="fa fa-cog"></i> <span>Cambie su Contraseña</span>
                    <span class="pull-right-container"></span>
                </a>
            </li>

        </ul>
    </section>
</aside>
<!--/MENU DE LA PAGINA.................................... -->


<!--AQUÍ INICIA EL BODY desde la divición del contect-wrapper-->
<div class="content-wrapper">