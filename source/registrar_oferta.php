<link href="themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script> <!-- Si deseas el idioma en español -->

<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <h1>Registro de Oferta Laboral </h1>
  <!-- Inicio Zona  central del sistema  -->

  <form method="POST" action="guardar_oferta.php">

    <div class="form-group row">
      <label for="txt_titulo" class="col-sm-2 col-form-label">Titulo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_titulo" id="txt_titulo" required="required">
      </div>
    </div>

    <div class="form-group row">
      <label for="txt_descripcion" class="col-sm-2 col-form-label">Descripcion</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_descripcion" id="txt_descripcion" required="required">
      </div>
    </div>

    <div class="form-group row">
      <label for="txt_fecha_publicacion" class="col-sm-2 col-form-label">Fechas</label>
      <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="txt_fecha_publicacion" placeholder="Fecha Publicacion" required="required">
      </div>
      <div class="col-sm-5">
        <input type="text" class="form-control datepicker" name="txt_fecha_cierre" placeholder="Fecha Cierre" required="required">
      </div>
    </div>

    <div class="form-group row">
      <label for="txt_remuneracion" class="col-sm-2 col-form-label">Remuneracion</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_remuneracion" id="txt_remuneracion" pattern="\d+(\.\d{1,2})?" title="Solo números y punto decimal" required="required">
      </div>
    </div>

    <div class="form-group row">
      <label for="txt_ubicacion" class="col-sm-2 col-form-label">Ubicacion</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_ubicacion" id="txt_ubicacion" required="required">
      </div>
    </div>

    <div class="form-group row">
      <label for="txt_tipo" class="col-sm-2 col-form-label">Tipo</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_tipo" id="txt_tipo" pattern="[A-Za-z\s]+" title="Solo letras permitidas" required="required">
      </div>
    </div>

    <div class="form-group row">
      <label for="txt_limite_postulantes" class="col-sm-2 col-form-label">Limite Postulantes</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="txt_limite_postulantes" id="txt_limite_postulantes" pattern="\d{1,2}" title="Solo números permitidos, máximo dos dígitos" required="required">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Guardar Oferta</button>
      </div>
    </div>

  </form>
  <!-- Fin Zona  central del sistema  -->
</div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>

<script>
  // Inicializar los datepickers
  $(document).ready(function() {
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd', // Formato de fecha deseado
      language: 'es' // Idioma (si se desea)
    });
  });

  // Validaciones adicionales de entrada de usuario
  document.getElementById('txt_remuneracion').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^0-9.]/g, '');
  });

  document.getElementById('txt_tipo').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/[^A-Za-z\s]/g, '');
  });

  document.getElementById('txt_limite_postulantes').addEventListener('input', function (e) {
    var value = e.target.value;
    e.target.value = value.replace(/\D/g, '');
    if (value.length > 2) {
      e.target.value = value.slice(0, 2);
    }
  });
</script>
