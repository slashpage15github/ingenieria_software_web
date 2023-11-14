<?php
session_unset();//para eliminar las variables de sesion
?>
<!doctype html>
<html lang="en">
  <head>
 
    <?php
    include_once "inclusiones/meta_tags.php"; 
    ?>
    
    <title>Login Cuentas</title>

    <?php
    include_once "inclusiones/css_y_favicon.php"; 
    ?>
<style>
/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/f/e/3/168419.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
</style>

<script>
   function valida_usuario(){
    var usuario=$( "#usuario" ).val().trim();
    var contra=$( "#contrasena" ).val().trim();

//if(response.length == 0){
  //  alert("Captcha no verificado")
    //return false;
 // }
//alert(response);
//alert(contra);

//    var capt=$( "#tmptxt" ).val();



    if (usuario.length==0){
      Swal.fire({
        type: 'error',
        title: 'Error: Registre un usuario, no puede ir vacío, verifique.',
        text: '¡Verificar, por favor!'});
    }
    else if (contra.length==0){
        Swal.fire({
        type: 'error',
        title: 'Error: Registre una contraseña, no puede ir vacía, verifique.',
        text: '¡Verificar, por favor!'});
    }
    else{
            $('#contentplace').html('<div><img src="images/loading4.gif"/>Cargando...</div>');

       var datos={usuario:usuario,contra:contra};
  $.ajax({
              url: 'actions/verifica_usuario.php',
              type: 'POST',
              dataType: 'html',
              data: datos,
              success: function(response){
                //alert(response);
              
                if(response=="true")
                  {
  
                     //Alert.render("Candidato de desempeño, recargado con éxito.");
                     window.location.href = "index.php";

                }else{
                      Swal.fire({
                      type: 'error',
                      title: 'Error: Datos incorrectos vuelva a intentar.',
                      text: '¡Verificar, por favor!'});
                }         
              },
                error: function(xhr, desc, err) {
                  console.log(xhr);
                  console.log("Details: " + desc + "\nError:" + err);
                }
  });

    }
  }
  </script>

  </head>
  <body>
<!-- Page Content -->
<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card">
      <div class="card-header">
        <h3>Login</h3>
        <!--
        <div class="d-flex justify-content-end social_icon">
          <span><i class="fab fa-facebook-square"></i></span>
          <span><i class="fab fa-google-plus-square"></i></span>
          <span><i class="fab fa-twitter-square"></i></span>
        </div>-->
      </div>
      <div class="card-body">
        <form name="login_form" method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" id="usuario" name="usuario" class="form-control" placeholder="usuario" required="true">
            
          </div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="contraseña" required="true">
          </div>
 

          <div class="form-group">
            <input type="button" id="val_user" name="val_user" value="Ingresar" class="btn float-right login_btn" onclick="javascript:valida_usuario();">
          </div>
        </form>
      </div>
      <div class="card-footer">
        <div class="d-flex justify-content-center">
        </div>
      </div>
    </div>
  </div>
</div>     
<!-- End Page Content -->
    <?php
    include_once "inclusiones/pie_de_pagina.php"; 
    ?>
   
   <?php
    include_once "inclusiones/js_incluidos.php"; 
    ?>
  </body>
</html>