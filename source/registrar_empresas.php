<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<h1>Registro de Empresas </h1>
    <!-- Inicio Zona  central del sistema  -->

  <form method="POST" action="guardar_empresa.php" >

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Razon social</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="txt_razon_social" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">RUC</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="txt_ruc" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_direccion" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_correo" required="required" >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_telefono" required="required" >
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar Empresa</button>
    </div>
  </div>

</form>





    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>