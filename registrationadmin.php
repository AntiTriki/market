<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro Admin</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-registration">
    <?php include './inc/navbar.php'; ?>
    <section id="form-registration">
        <div class="container">
            <div class="row">
                <div class="page-header">
                  <h1>Registro de Admin <small class="tittles-pages-logo">MUSIC INSTRUMENT</small></h1>
                </div>
                <div class="col-xs-12 col-sm-6 text-center">
                   <br><br><br>
                    <p><i class="fa fa-users fa-5x"></i></p>
                    <p class="lead">
                        Al registrarse va a tener el poder de ingresar productos

                    <br>
                    <img src="assets/img/img-registration.png" alt="electrodomesticos" class="img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6">
                   <br><br>
                    <div id="container-form">
                       <p style="color:#fff;" class="text-center lead">Debera de llenar todos los campos para registrarse</p>
                       <br><br>
                       <form class="form-horizontal FormCatElec" action="process/registroadmin.php" role="form" method="post" data-form="save">
                   
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input class="form-control all-elements-tooltip" type="text" placeholder="Ingrese su nombre de Administrador" required name="name" data-toggle="tooltip" data-placement="top" title="Ingrese su nombre. Máximo 9 caracteres (solamente letras)" pattern="[a-zA-Z]{1,9}" maxlength="9">
                              </div>
                            </div>
                           
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                <input class="form-control all-elements-tooltip" type="password" placeholder="Introdusca una contraseña" required name="pass" data-toggle="tooltip" data-placement="top" title="Defina una contraseña para iniciar sesión">
                              </div>
                            </div>
                            <br>
                        
                            <br>
                            <p><button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>&nbsp; Registrarse</button></p>
                            <div class="ResForm" style="width: 100%; color: #fff; text-align: center; margin: 0;"></div>
                        </form> 
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>