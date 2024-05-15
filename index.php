<?php
include("includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<?php
    if(isset($_REQUEST['noautorizado'])){
        echo 'no autorizado';
    }
?>

<!-- Inicio Zona central del sistema -->
<div class="text-center mt-5">
    <h1>¡Busca el trabajo de tus sueños!</h1>
</div>

<div class="text-center mt-4">
    <img src="images/logo 1.jpg" alt="Imagen de búsqueda de empleo" style="max-width: 30%;" class="img-fluid blurry-shadow mx-auto d-block">
</div>

<div class="row mt-4" >
    <div class="col-md-6 offset-md-3 ">
        <div class="input-group ">
            <form action="source/mostrar_ofertas.php" method="GET" class="w-100">
                <input type="text" name="query" class="form-control" placeholder="Cargo o Area">
                <div class="input-group-append mt-2 ">
                <a href=""><span type="submit" class="btn btn-primary">Buscar</span></a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Zona central del sistema -->

</div>
<!-- /.container-fluid -->

<?php
include("includes/foot.php");
?>


