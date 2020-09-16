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
                <a href="#"><i class="fa fa-circle text-success"></i> Administrador</a>
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

            <!-- MENU DE PRESTAMOS-->
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart "></i>
                    <span>Préstamos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                    <li><a href="../pagesBody/consultarFuncionario.php?accion=realizarPrest"><i class="fa fa-cart-plus text-green"></i> Realizar Nuevo</a></li>
                    <li><a href="../pagesBody/consultarFuncionario.php?accion=consultarPrest"><i class="fa fa-search text-yellow"></i> Consultar por Usuario</a></li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-industry text-aqua"></i>
                            <span>Elementos Prestados</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../_controlador/PrestamoElementoController.php?accion=mostrarPrestVigentes"><i class="fa fa-circle-o text-aqua"></i> Vigentes</a></li>
                            <li><a href="../_controlador/PrestamoElementoController.php?accion=mostrarPrestNoVigentes"><i class="fa fa-ban text-red"></i> No Vigentes</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart text-red"></i>
                            <span>Consumos Prestados</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../_controlador/PrestamoConsumoController.php?accion=mostrarPrestVigentes"><i class="fa fa-circle-o text-aqua"></i> Vigentes</a></li>
                            <li><a href="../_controlador/PrestamoConsumoController.php?accion=mostrarPrestNoVigentes"><i class="fa fa-ban text-red"></i> No Vigentes</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-industry "></i>
                    <span>Elementos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../pagesBody/addElementos.php"><i class="fa fa-plus-circle text-green"></i> Registrar Nuevo</a></li>
                    <li><a href="../_controlador/ElementoController.php?accion=mostrarDisponibles"><i class="fa fa-circle-o text-aqua"></i> Disponibles</a></li>
                    <li><a href="../_controlador/ElementoController.php?accion=mostrarPrestados"><i class="fa fa-circle text-red"></i> Prestados</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart "></i>
                    <span>Consumos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../pagesBody/addConsumos.php"><i class="fa fa-plus-circle text-green"></i> Registrar Nuevo</a></li>
                    <li><a href="../_controlador/ConsumoController.php?accion=mostrarControlados"><i class="fa fa-wrench text-yellow"></i> Controlados</a></li>
                    <li><a href="../_controlador/ConsumoController.php?accion=mostrarNoControlados "><i class="fa fa-paperclip text-aqua"></i> No Controlados</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users "></i>
                    <span>Usuarios</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../pagesBody/addUsuarios.php"><i class="fa fa-user-plus text-green"></i> Registrar Nuevo</a></li>
                    <li><a href="../_controlador/UsuarioController.php?accion=mostrarCuentadantes"><i class="fa fa-user text-aqua"></i> Cuentadantes</a></li>
                    <li><a href="../_controlador/UsuarioController.php?accion=mostrarFuncionarios"><i class="fa fa-male text-yellow"></i> Funcionarios</a></li>
                    <li><a href="../_controlador/UsuarioController.php?accion=mostrarPorteros"><i class="fa fa-user-secret text-red"></i> Porteros</a></li>
                </ul>
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