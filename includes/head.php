<?php
include ("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de bolsa laboral</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo RUTAGENERAL; ?>themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo RUTAGENERAL; ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo RUTAGENERAL; ?>js/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="<?php echo RUTAGENERAL; ?>js/jquery-ui.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   

</head>

<body id="page-top">
    


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Inicio Sidebar - menu izquierdo -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?php echo RUTAGENERAL; ?>themplates/img/portafolio.png" alt="" width="30px"
                        style="margin-right: 5px;">
                </div>
                <div class="sidebar-brand-text mx-1">Bolsa Laboral</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Inicio -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Inicio</span></a>
            </li>
            <!-- Nav Item - Charts -->
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registro_usuarios.php">
                    <i class="bi bi-person-add"></i>
                    <span>Registrar usuario</span></a>
            </li>
            

            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/mostrar_ofertas.php">
                    <i class="bi bi-person-add"></i>
                    <span>Ofertas Laborales</span></a>
            </li>

            <?php if (isset($_SESSION["SESION_ROL"]) && $_SESSION["SESION_ROL"] == '2') { ?>

                <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registrar_oferta.php">
                    <i class="bi bi-building-add"></i>
                    <span>Registrar Oferta Laboral</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/listar_ofertas.php">
                        <i class="bi bi-building-add"></i>
                        <span>Oferta Laboral</span></a>
                </li>

                <?php } ?>

            <?php
            if(isset($_SESSION["SESION_ROL"]) && $_SESSION["SESION_ROL"]=='1'){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registro_usuarios.php">
                    <i class="bi bi-person-add"></i>
                    <span>Registrar usuario</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/listar_usuarios.php">
                    <i class="bi bi-person"></i>
                    <span>Usuarios</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registrar_empresas.php">
                    <i class="bi bi-building-add"></i>
                    <span>Registrar Empresas</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registrar_oferta.php">
                    <i class="bi bi-building-add"></i>
                    <span>Registrar Oferta Laboral</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/listar_ofertas.php">
                    <i class="bi bi-building-add"></i>
                    <span>Oferta Laboral</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/listar_empresas.php">
                    <i class="bi bi-building"></i>
                    <span>Empresas</span></a>
            </li>

            

            <?php
                }
            ?>

            <?php
                if(!isset($_SESSION["SESION_NOMBRES"])){

                
            ?>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/form_login.php">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Iniciar Sesion</span></a>
            </li>

            <?php
                }else{
                    ?>
                    <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/logout.php">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Cerrar Sesion</span></a>
            </li>
                    <?php
                }
            ?>


        </ul>
        <!-- Fin Sidebar - menu izquierdo -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex flex-row-reverse">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <?php
                        if(isset($_SESSION['SESION_NOMBRES']))
                            echo "Bienvenido ".$_SESSION['SESION_NOMBRES']." ".$_SESSION['SESION_APELLIDOS'];
                        else
                            echo "Inicie sesion"

                    ?>



                </nav>
                <!-- End of Topbar -->
    </body>
</html>