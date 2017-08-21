    <?php
        session_start();
        include '../library/configServer.php';
        include '../library/consulSQL.php';
        
        $codeProd= $_POST['prod-codigo'];
        $nameProd= $_POST['prod-name'];
        $cateProd= $_POST['prod-categoria'];
        $priceProd= $_POST['prod-price'];
        $modelProd= $_POST['prod-model'];
        $marcaProd= $_POST['prod-marca'];
        $stockProd= $_POST['prod-stock'];
        $codePProd= $_POST['prod-codigoP'];
        $adminProd= $_POST['admin-name'];

        if(!$codeProd=="" && !$nameProd=="" && !$cateProd=="" && !$priceProd=="" && !$modelProd=="" && !$marcaProd=="" && !$stockProd=="" && !$codePProd=="" && !$_FILES['img']['name']==""){
            $verificar=  ejecutarSQL::consultar("select * from producto where CodigoProd='".$codeProd."'");
            $verificaltotal = mysql_num_rows($verificar);
            if($verificaltotal<=0){
                if(move_uploaded_file($_FILES['img']['tmp_name'],"../assets/img-products/".$_FILES['img']['name'])){
                    if(consultasSQL::InsertSQL("producto", "CodigoProd, NombreProd, CodigoCat, Precio, Modelo, Marca, Stock, NITProveedor, Imagen, Nombre", "'$codeProd','$nameProd','$cateProd','$priceProd', '$modelProd','$marcaProd','$stockProd','$codePProd','".$_FILES['img']['name']."','$adminProd'")){
                       echo '
                            
                                                    <tr id="ures-update-product-'.$codeProd.'">
													<div id="update-product">
                                                  <form method="post" id="res-update-product-'.$codeProd.'">
                                                        <td>
                                                          <input class="form-control" type="hidden" name="code-old-prod" required="" value="'.$codeProd.'">
                                                          <input class="form-control" type="text" name="code-prod" maxlength="30" required="" value="'.$codeProd.'">
                                                        </td>
                                                        <td><input class="form-control" type="text" name="prod-name" maxlength="30" required="" value="'.$nameProd.'"></td>
                                                        <td>';
                                                            $categoriac3=  ejecutarSQL::consultar("select * from categoria where CodigoCat='".$cateProd."'");
                                                            while($catec3=mysql_fetch_array($categoriac3)){
                                                                $codeCat=$catec3['CodigoCat'];
                                                                $nameCat=$catec3['Nombre'];
                                                            }
                                                      echo '<select class="form-control" name="prod-category">';
                                                                echo '<option value="'.$codeCat.'">'.$nameCat.'</option>';
                                                                $categoriac2=  ejecutarSQL::consultar("select * from categoria");
                                                                while($catec2=mysql_fetch_array($categoriac2)){
                                                                    if($catec2['CodigoCat']==$codeCat){
                                                                        
                                                                    }else{
                                                                      echo '<option value="'.$catec2['CodigoCat'].'">'.$catec2['Nombre'].'</option>';  
                                                                    }
                                                                    
                                                                }
                                                      echo '</select>
                                                        </td>
                                                        <td><input class="form-control" type="text-area" name="price-prod" required="" value="'.$priceProd.'"></td>
                                                        <td><input class="form-control" type="tel" name="model-prod" required="" maxlength="20" value="'.$modelProd.'"></td>
                                                        <td><input class="form-control" type="text-area" name="marc-prod" maxlength="30" required="" value="'.$marcaProd.'"></td>
                                                        <td><input class="form-control" type="text-area" name="stock-prod" maxlength="30" required="" value="'.$stockProd.'"></td>
                                                        <td>';
                                                           $proveedoresc3=  ejecutarSQL::consultar("select * from proveedor where NITProveedor='".$codePProd."'");
                                                           while($provc3=mysql_fetch_array($proveedoresc3)){
                                                                    $nombreP=$provc3['NombreProveedor'];
                                                                    $nitP=$provc3['NITProveedor'];
                                                            }
                                                       echo '<select class="form-control" name="prod-Prove">';
                                                                echo '<option value="'.$nitP.'">'.$nombreP.'</option>';
                                                                $proveedoresc2=  ejecutarSQL::consultar("select * from proveedor");
                                                                while($provc2=mysql_fetch_array($proveedoresc2)){
                                                                    if($provc2['NITProveedor']==$nitP){
                                                                        
                                                                    }else{
                                                                      echo '<option value="'.$provc2['NITProveedor'].'">'.$provc2['NombreProveedor'].'</option>';
                                                                    }  
                                                                }  
                                                       echo '</select>
                                                        </td>
                                                        <td class="text-center" style="padding: 10px 0">
														<div class="btn-group" role="group" aria-label="...">
                                                            
															</div>
															<div id="res-update-product-'.$codeProd.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                        </td>
														</form>
                                                </div>
                                                    </tr>
                                                  
                                                ';
                   }else{
                      echo '
                            <img src="../assets/img/incorrectofull.png" class="center-all-contens">
                            <br>
                            <h3>Ha ocurrido un error. Por favor intente nuevamente</h3>
                            <p class="lead text-cente">
                                La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                                <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
                            </p>';
                   }   
                }else{
                    echo ' 
                        <img src="../assets/img/incorrectofull.png" class="center-all-contens">
                         <br>
                         <h3>Ha ocurrido un error al cargar la imagen</h3>
                         <p class="lead text-cente">
                             La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                             <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
                         </p>';
                }
            }else{
                echo '
                    <img src="../assets/img/incorrectofull.png" class="center-all-contens">
                    <br>
                    <h3>El Código de producto ya esta registrado.<br>Por favor ingrese otro código de producto</h3>
                    <p class="lead text-cente">
                        La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                        <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
                    </p>';
            }
        }else {
            echo '
                <img src="../assets/img/incorrectofull.png" class="center-all-contens">
                <br>
                <h3>Error los campos no deben de estar vacíos</h3>
                <p class="lead text-cente">
                    La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                    <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
                </p>';
        }
        ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>