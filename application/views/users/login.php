<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Login</title>

  </head>

  <body class="bg-dark">
    <p>
        <?php echo $this->session->flashdata('verify_msg'); ?>
    </p>
    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <?php if($this->session->flashdata('msg_success')) { ?>
            <div class="alert alert-success">
                 <?php echo $this->session->flashdata('msg_success'); ?>
            </div>
         <?php } ?>
         <?php if($this->session->flashdata('msg_error')) { ?>
            <div class="alert alert-danger">
                 <?php echo $this->session->flashdata('msg_error'); ?>
            </div>
        <?php } ?>
        <div class="card-header">Acceder al administrador</div>
        <div class="card-body">
          <?php $attributes = array("name" => "loginform", "role" => "form" );
              echo form_open("users/login", $attributes);?>
          <form>
            <div class="form-group <?php echo form_error('email') ? 'has-error' : '' ?>">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" name="email">
                <label for="inputEmail">E-mail</label>
              </div>
            </div>
            <div class="form-group <?php echo form_error('password') ? 'has-error' : '' ?>">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                <label for="inputPassword">Clave</label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Recordarme
                </label>
              </div>
            </div>
            <button class="btn btn-primary btn-block">Acceder</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url("users/register");?>">Registrar Cuenta</a>
            <a class="d-block small" href="forgot-password.html">Me olvidé la contraseña?</a>
          </div>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </body>

</html>
