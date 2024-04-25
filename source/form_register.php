<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">


<form method="POST" action="guardar_usuario.php" >

<div class="form-group row">
  <label for="inputEmail3" class="col-sm-2 col-form-label">DNI</label>
  <div class="col-sm-10">
    <input type="text" class="form-control"  name="txt_dni" required="required">
  </div>
</div>

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Nombres</label>
  <div class="col-sm-10">
    <input type="text" class="form-control"  name="txt_nombres" required="required">
  </div>
</div>

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Apellidos</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="txt_apellidos" required="required">
  </div>
</div>

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Direccion</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="txt_direccion" required="required" >
  </div>
</div>

<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Telefono</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="txt_telefono" required="required" >
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Usuario</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="txt_usuario" required="required" >
  </div>
</div>
<div class="form-group row">
  <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" name="txt_contrasenia" required="required" >
  </div>
</div>

<div class="form-group row">
  <div class="col-sm-10">
    <button type="submit" class="btn btn-primary">Registrarse</button>
  </div>
</div>

</form>


</div>
<!-- /.container-fluid -->
<?php
    include("../includes/foot.php");
?>