<?php
error_reporting(E_PARSE);
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$suma = 0;
if(isset($_GET['precio'])){
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;
}

echo "
<script>
$(document).ready(function(){

    // Delete 
    $('.delete').click(function(){
        var el = this;
        var id = this.id;
        var splitid = id.split('_');

        // Delete id
        var deleteid = splitid[1];
        
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800, function(){      
                    $(this).remove();
         
    });
	});
});
</script>
<table id='table1' class='table table-bordered'>
<tr style='background: black;'>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
					
                </tr>
<form id='lista'  action='pedido.php' method='POST'>";
for($i = 0;$i< $_SESSION['contador'];$i++){
	$l =$i+1;
    $consulta=ejecutarSQL::consultar("select * from producto where CodigoProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysql_fetch_array($consulta)) {
            echo "
			<script>
			function calcular".$i."(){
			var m1 = document.getElementById('unidades_a_comprar".$i."').value;
			var m2 = document.getElementById('subtotal".$i."').value;
			//document.getElementById('subtotal2').value = m1*m2;			
			document.getElementById('subtotal2".$i."').innerHTML =m1*m2;	
			};
			</script>
			<tr><td>".$fila['NombreProd']."</td>
			<input form='lista'  type='hidden' name='prod[]' value='".$fila['NombreProd']."' style=' display:none' readonly=''>
			<td style='width:50px'> <select form='lista' class='' style='color:#000; width:50px' onchange='calcular".$i."();recarga2()' id='unidades_a_comprar".$i."' name='unidades[]'>";
			for($j=1;$j<= $fila['Stock'];$j++ ){
			echo "<option value='".$j."'>".$j."</option>";
			}
			echo "</select></td>
			<input form='lista' id='subtotal".$i."' type='hidden' value='".$fila['Precio']."' style=' display:none' readonly=''>
			<td id='subtotal2".$i."' class='col1' style='width:50px'> ".$fila['Precio']."</td><td style='width:30px'> <span id='del_".$i."' style='cursor:pointer' class='delete glyphicon glyphicon-log-out' onclick=''></span></td></tr>";
    $suma += $fila['Precio'];
    }
}
echo "<tr><td colspan='2'>Total</td><td id='total'></td>
<input form='lista' id='totas' name='totas'  type='text' style='display:none'>
</tr> 
</form>
</table>";
echo "

<script>
                         
                var getSum = function (colNumber) {
                var sum = 0;
                var selector = '.col' + colNumber;
            
                $('#table1').find(selector).each(function (index, element) {
                    sum += parseInt($(element).text());
                });  
            
                return sum.toFixed(2) ;        
            };
            
            $('#totas').each(function (index, element) {
                $(this).val(getSum(index + 1));
                 
            });
                         
                        </script>

						<script>
                        function recarga2(){
                        var getSum = function (colNumber) {
                var sum = 0;
                var selector = '.col' + colNumber;
            
                $('#table1').find(selector).each(function (index, element) {
                    sum += parseInt($(element).text());
                });  
            
                return sum.toFixed(2) ;        
            };
            
            $('#totas').each(function (index, element) {
                $(this).val(getSum(index + 1));
                 
            });
            document.getElementById('total').textContent=document.getElementById('totas').value;
                        };
                        
                        </script>
						
						<script>
						$(document).ready(function() {
					$('#totas').each(function (index, element) {
					$(this).val(getSum(index + 1));
					
					});
					document.getElementById('total').textContent=document.getElementById('totas').value;
					});
    					</script>
";
$_SESSION['sumaTotal']=$suma;