<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<h1>Registro de Oferta Laboral </h1>
    <!-- Inicio Zona  central del sistema  -->

  <form method="POST" action="guardar_oferta.php" >

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="txt_titulo" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Descripcion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="txt_descripcion" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha Publicacion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_fecha_publicacion" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Fecha Cierre</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_fecha_cierre" required="required" >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Remuneracion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_remuneracion" required="required" >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Ubicacion</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_ubicacion" required="required" >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Tipo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_tipo" required="required" >
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Limite Postulantes</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_limite_postulantes" required="required" >
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