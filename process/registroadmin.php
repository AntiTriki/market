<?php
include '../library/configServer.php';
include '../library/consulSQL.php';



$name= $_POST['name'];
$name= $_POST['name'];

$pass= md5($_POST['pass']);



if(!$name=="" ){
    $verificar=  ejecutarSQL::consultar("select * from administrador where nombre='".$name."'");
    $verificaltotal = mysql_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("administrador", "Nombre, Clave", "'$name','$pass'")){
            echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';
        }else{
           echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente'; 
        }
    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>El Nombre que ha ingresado ya esta registrado.<br>Por favor ingrese otro número de Nombre';
    }
}else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error los campos no deben de estar vacíos';
}

