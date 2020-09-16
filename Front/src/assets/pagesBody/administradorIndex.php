<?php
$title = 'Administrador | Inicio';
include_once '../pagesIncludes/header.php';

if($_SESSION['usuarioLogin']->getTipo_usuario() == 'Administrador'){//validamos el inicio de sesión
    include_once '../pagesIncludes/menuAdministrador.php';
}else{//cierre de la validación de inicio de sessión
    ?>
    <script>
        //se redirecciona a dicha pagina
        document.location.href = '../pagesIncludes/ObjetoNoEncontrado.php';
    </script>
    <?php
}
?>

<!--CUERPO DE LA PAGINA................................................................................-->
<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo ($_SESSION['cantPrestamos'])?></h3>

                    <p>Préstamos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href=" " class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo ($_SESSION['cantidadElemento'])?></h3>

                    <p>Elementos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href=" " class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo ($_SESSION['cantidadConsumo'])?></h3>

                    <p>Consumos</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href=" " class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo ($_SESSION['cantidadUsuario'])?></h3>

                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href=" " class="small-box-footer">Más Información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <!-- /.row -->

    <!-- AQUI EMPIEZA EL CAROUSEL................................... -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <!-- aqui insertaremos el slider -->
                <div id="carousel1" class="carousel slide" data-ride="carousel">
                    <!-- Indicatodores -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel1" data-slide-to="1"></li>
                        <li data-target="#carousel1" data-slide-to="2"></li>
                    </ol>

                    <!-- Contenedor de las imagenes -->
                    <div class="carousel-inner" role="listbox">

                        <div class="item active">
                            <img src="../img/carousel/1.jpg" alt="Imagen 1">
                            <div class="carousel-caption"> Mi imagen 1 </div>
                        </div>

                        <div class="item">
                            <img src="../img/carousel/2.jpg" alt="Imagen 2">
                            <div class="carousel-caption"> Mi imagen 2 </div>
                        </div>

                        <div class="item">
                            <img src="../img/carousel/3.jpg" alt="Imagen 3">
                            <div class="carousel-caption"> Mi imagen 3 </div>
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Siguiente</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /AQUI TERMINA EL CAROUSEL................................... -->

    <?php
    include_once '../pagesIncludes/footer.php';
    ?>

