<?php
include("includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->
   
    <?php
    if(isset($_REQUEST['noautorizado'])){
        echo 'no autorizado';
    }
    ?>




    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
    include("includes/foot.php");
?>