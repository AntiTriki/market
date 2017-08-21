<?php
session_start(); 

include '../library/configServer.php';
include '../library/consulSQL.php';
$num=$_POST['clien-number'];
if($num=='notlog'){
   $nameClien=$_POST['clien-name'];
   $passClien=  md5($_POST['clien-pass']); 
}
if($num=='log'){
   $nameClien=$_POST['clien-name'];
   $passClien=$_POST['clien-pass']; 
}


$verdata=  ejecutarSQL::consultar("select * from cliente where Clave='".$passClien."' and Nombre='".$nameClien."'");
$num=  mysql_num_rows($verdata);
if($num>0){
  if($_POST['totas']>0){


  $data= mysql_fetch_array($verdata);
  $nitC=$data['NIT'];
  $StatusV="Pendiente";
  
  /*Insertando datos en tabla venta*/
  consultasSQL::InsertSQL("venta", "Fecha, NIT, Descuento, TotalPagar, Estado", "'".date('d-m-Y')."','".$nitC."','0','".$_POST['totas']."','".$StatusV."'");
  
  /*recuperando el número del pedido actual*/
  $verId=ejecutarSQL::consultar("select * from venta where NIT='$nitC' order by NumPedido desc limit 1");
  while($fila=mysql_fetch_array($verId)){
     $Numpedido=$fila['NumPedido'];
  }
  
  /*Insertando datos en detalle de la venta
  for($i = 0;$i< $_SESSION['contador'];$i++){*/
	  foreach($_POST['prod'] as $key => $text_field){
      consultasSQL::InsertSQL("detalle", "NumPedido, CodigoProd, CantidadProductos", "'$Numpedido', '".$text_field."', '".$_POST['unidades'][$key]."'");

      /*Restando un stock a cada producto seleccionado en el carrito*/
    $prodStock=ejecutarSQL::consultar("select * from producto where CodigoProd='".$text_field."'");
    while($fila = mysql_fetch_array($prodStock)) {
        $existencias = $fila['Stock'];
		$cant=$_POST['unidades'][$key];
        consultasSQL::UpdateSQL("producto", "Stock=('$existencias'-'$cant')", "CodigoProd='".$text_field."'");
    }
  }
    
    /*Vaciando el carrito*/
    unset($_SESSION['producto']);
    unset($_SESSION['contador']);
    
    echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El pedido se ha realizado con éxito';
  }else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>No has seleccionado ningún producto, revisa el carrito de compras';
  }

}else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nombre o contraseña invalidos';
}
 


