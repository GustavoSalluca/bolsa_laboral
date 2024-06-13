<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid d-flex justify-content-center">

  <div class="col-md-8"> <!-- Ajusta el tamaño del contenedor aquí -->
    <h1 class="text-center">Registro de Usuarios Nuevos </h1>
    <!-- Inicio Zona  central del sistema  -->

    <form method="POST" action="guardar_usuario.php">

      <div class="form-group row">
        <label for="txt_dni" class="col-sm-2 col-form-label">DNI</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="txt_dni" id="txt_dni" pattern="\d{8}" title="Debe contener exactamente 8 dígitos numéricos" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="txt_nombres" class="col-sm-2 col-form-label">Nombres</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="txt_nombres" id="txt_nombres" pattern="[A-Za-z\s]+" title="Solo letras y espacios permitidos" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="txt_apellidos" class="col-sm-2 col-form-label">Apellidos</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="txt_apellidos" id="txt_apellidos" pattern="[A-Za-z\s]+" title="Solo letras y espacios permitidos" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="txt_direccion" class="col-sm-2 col-form-label">Direccion</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" maxlength="10" name="txt_direccion" required="required">
        </div>
      </div>

      <div class="form-group row">
        <label for="txt_telefono" class="col-sm-2 col-form-label">Telefono</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="txt_telefono" id="txt_telefono" pattern="[0-9+\-() ]+" title="Solo números y símbolos permitidos" required>
        </div>
      </div>

      <div class="form-group row">
        <label for="txt_usuario" class="col-sm-2 col-form-label">Usuario</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="txt_usuario" required="required">
        </div>
      </div>

      <div class="form-group row">
        <label for="txt_contrasenia" class="col-sm-2 col-form-label">Contraseña</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="txt_contrasenia" required="required">
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Guardar Usuario</button>
        </div>
      </div>

    </form>
  </div>
</div>

<script>
  document.getElementById('txt_dni').addEventListener('input', function (e) {
    var value = e.target.value;
    if (!/^\d*$/.test(value)) {
      e.target.value = value.replace(/\D/g, '');
    }
    if (value.length > 8) {
      e.target.value = value.slice(0, 8);
    }
  });

  document.getElementById('txt_nombres').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^A-Za-z\s]/g, '');
  });

  document.getElementById('txt_apellidos').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^A-Za-z\s]/g, '');
  });

  document.getElementById('txt_telefono').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^0-9+\-() ]/g, '');
  });
</script>

<!-- Fin Zona  central del sistema -->
<?php
include("../includes/foot.php");
?>
