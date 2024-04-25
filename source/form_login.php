<?php
include("../includes/head.php");
?>
<style>
  .btn-color{
  background-color: #0e1c36;
  color: #fff;
  
}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}



.cardbody-color{
  background-color: #ebf2fa;
}

a{
  text-decoration: none;
}
</style>

<!-- Begin Page Content -->
<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Login</h2>
        <div class="text-center mb-5 text-dark">Inicie Sesión</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" method="POST" action="login.php">

            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input name="txt_usuario" type="text" class="form-control" placeholder="Ingrese Usuario" required="required" aria-describedby="emailHelp"
                >
            </div>
            <div class="mb-3">
              <input name="txt_password" type="password" class="form-control" placeholder="Password" required="required">
            </div>
            
           <!-- <div id="emailHelp" class="form-text text-center mb-5 text-dark">Not
              Registered? <a href="#" class="text-dark fw-bold"> Create an
                Account</a>
            </div>-->
            <?php
              if(isset($_REQUEST['error_login'])){
            ?>

            <div class="form-group">
                <div class="alert alert-danger" role="alert">
                Usuario y/o Contraseña no existen
                </div>  
              </div>
              <?php
                }
              ?>
              <div class="text-center"><button type="submit" class="btn btn-success px-5  w-50">Login</button></div>

              
          </form>
        </div>

      </div>
    </div>
  </div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>