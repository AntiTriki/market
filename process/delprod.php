<?php
 include '../library/configServer.php';
 include '../library/consulSQL.php';

 
 
 $codeProd= $_POST['code-old-prod'];
 $cons=  ejecutarSQL::consultar("select * from producto where CodigoProd='$codeProd'");
 $totalproductos = mysql_num_rows($cons);
 $tmp=  mysql_fetch_array($cons);
 $imagen=$tmp['Imagen'];
 if($totalproductos>0){
    if(consultasSQL::DeleteSQL('producto', "CodigoProd='".$codeProd."'")){
        $carpeta='../assets/img-products/';
        $directorio=$carpeta.$imagen;
        chmod($directorio, 0777);
        unlink($directorio);
        
    }else{
         
    }
 }else{
    
 }