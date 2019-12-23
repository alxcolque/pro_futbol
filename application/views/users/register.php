<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Register</title>

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Registrar cuenta</div>
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
        <div class="card-body">
          <?php $attributes = array("name" => "registrationform", "role" => "form" );
          echo form_open("users/register", $attributes);?>
          <form>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group <?php echo form_error('nombre') ? 'has-error' : '' ?>">
                    <input name="nombre" type="text" id="firstName" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                    <label for="firstName">Nombre</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group <?php echo form_error('apellido') ? 'has-error' : '' ?>">
                    <input name="apellido" type="text" id="lastName" class="form-control" placeholder="Last name" required="required">
                    <label for="lastName">Apellido</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group <?php echo form_error('email') ? 'has-error' : '' ?>">
                <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Dirección de correo</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group <?php echo form_error('clave') ? 'has-error' : '' ?>">
                    <input name="clave" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                    <label for="inputPassword">Clave</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group <?php echo form_error('cpassword') ? 'has-error' : '' ?>">
                    <input name="cpassword" type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                    <label for="confirmPassword">Confirmar Clave</label>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary btn-block">Registrar</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="<?php echo base_url("users/login");?>">Iniciar sesión</a>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>


  </body>

</html>
