<?
session_name('livees'); 
session_start();
?>
<!doctype html>
<html lang="">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Habilitar Notificaciones</title>

  <link rel="manifest" href="./manifest.json">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>

  <!-- Page styles -->
  <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <!--<header class="mdl-layout__header">
      <div class="mdl-layout__header-row">
        <span class="mdl-layout-title">Push Demo</span>
        <div class="mdl-layout-spacer"></div>
        
      </div>
    </header>-->

    <main>
      <div class="push-switch-container js-push-switch-container">
        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect js-push-toggle-switch" for="switch-2">
          <input type="checkbox" id="switch-2" class="mdl-switch__input" disabled>
          <span class="mdl-switch__label">Activar Notificaciones</span>
        </label>
      </div>

      <div class="content-overlap-wrapper">
        <div class="send-push-options js-send-push-options">
          <div style="display:none" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label payload-textfield js-payload-textfield-container hidden">
            <input class="mdl-textfield__input js-payload-textfield" type="text" id="payload-textfield">
            <label class="mdl-textfield__label" for="payload-textfield">Add Payload Text</label>
          </div>

          <p style="display:none"  class="state-msg js-state-msg"></p>

          <!--<p class="center js-xhr-button-container">
            <button class="xhr-button js-send-push-button mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
              Send a Push via XHR
            </button>
          </p>-->

          <!--<div class="js-curl-container">
            <hr />
            <h4>CURL Command</h4>
            <p class="js-curl-copy-msg">Copy and paste the following CURL
            command into your terminal to send a push message to your
            browser.</p>
            <p class="js-curl-error-msg"></p>

            <p class="snippet-code">
              <code class="curl-code-example js-curl-code language-markup"></code>
            </p>
          </div>-->

          <div  class="js-api-request">
            
            

            <!--<br />-->

            

            <pre style="display:none" ><code class="js-endpoint"></code></pre>

           <!--<br />-->

            <div style="display:none"  class="js-headers-list">
            </div>

            <!--<br />-->

            <span style="display:none"  class="js-body-format"></span>
			<!--<br />-->
            <span style="display:none"  id="prueba" class="js-body-content"></span>
            <!--<br />-->
            <script src="../../jquery-1.7.1.min.js"></script>
			
            <button onclick="myFunction()">Guardar cambios</button>

			<input type="text" id="demo">

			<script>
            function myFunction() {
               var device = document.getElementById("prueba").innerHTML;
			   var quitamos = device.substr(7);
			   //caracter-s que deseamos eliminar
				
				
				var res = quitamos.replace('"}', "");
			   
			   
			   
			   
			   document.getElementById("demo").value = res;
			   //caracter-s que deseamos eliminar
			
				showUser(document.getElementById("demo").value,<? echo $_SESSION['id_usuario'] ?>);
            }
            </script>
			<script>
			function showUser(str,str2) {
    		if (str == "" && str2 == "") {
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else { 
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
				}
			};
			var arti = document;
			xmlhttp.open("GET","../../in_liveesnotify.php?d="+str+"&m="+str2,true);
			xmlhttp.send();
			}	
			}
			</script>  
			
          </div>

          
        </div>
        <div class="error-message-container js-error-message-container">
          <h1 class="error-title js-error-title"></h1>
          <p class="error-message js-error-message"></p>
        </div>
      </div>
    </main>
  </div>

  <script src="./scripts/encryption/helpers.js"></script>
  <script src="./scripts/encryption/hmac.js"></script>
  <script src="./scripts/encryption/hkdf.js"></script>
  <script src="./scripts/encryption/encryption-factory.js"></script>
  <script src="./scripts/libs/snippets.js"></script>
  <script src="./scripts/push-client.js"></script>
  <script src="./scripts/app-controller.js"></script>
  <script src="./scripts/main.js"></script>

  <!--<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77119321-2', 'auto');
  ga('send', 'pageview');
  </script>-->
</body>
</html>
