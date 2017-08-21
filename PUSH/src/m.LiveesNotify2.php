<?
session_name('livees'); 
session_start();
?>
<head>
 <link href='https://fonts.googleapis.com/css?family=Roboto:100,500,700' rel='stylesheet' type='text/css'> 
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

  <link rel="manifest" href="./manifest.json">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>

  <!-- Page styles -->
  <link rel="stylesheet" href="./styles/main.css">
<style>
html,body{font-family: 'Roboto', sans-serif;
	font-size: 12px;
	/*font-style: italic;*/
	color: #000;
	background-color:#FFF;
	margin: 0 0;
	
}
a{ text-decoration:none}
*:focus {outline: none;}
</style>
<link rel="stylesheet" href="../../gstyle_buttons_final.css" type="text/css"  media="screen">
</head>

  <!--<script src="../../jquery-1.7.1.min.js"></script>-->
<script>
			function nfy(str,str2) {
    		if ((str == "" && str2 == "")) {
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
			xmlhttp.open("GET","https://www.livees.net/in_liveesnotify.php?d1="+str+"&d2="+str2,true);
			xmlhttp.send();
			}	
			}
			</script> 


<input type="hidden" id="id_dev">
<input type="hidden" id="id_dev_bkp">
<!--<input type="text" id="txtHint">-->
<p style="width:100%; height:auto; text-align:center">
<? echo $_SESSION['nombres']?>
<button id="nuevo_usuario" type="button" class="bluebtn" onClick="nfy(document.getElementById('id_dev').value,document.getElementById('id_dev_bkp').value);" style="width:80%">
        
                <span class="label" style=" width:100%; font-size:16px">
                Guardar cambios y Salir
                </span>
                </button>
</p>

<body style="overflow:hidden">
  

  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    

    <main>
      <div class="push-switch-container js-push-switch-container" style=" border:1px solid #06C">
        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect js-push-toggle-switch" for="switch-2">
          <input type="checkbox" id="switch-2" class="mdl-switch__input" disabled>
          <span class="mdl-switch__label">Habilitar Notificaciones</span>
        </label>
      </div>

      <div class="content-overlap-wrapper">
        <div class="send-push-options js-send-push-options">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label payload-textfield js-payload-textfield-container hidden">
            <input class="mdl-textfield__input js-payload-textfield" type="text" id="payload-textfield">
            <label class="mdl-textfield__label" for="payload-textfield">Add Payload Text</label>
          </div>

          <p class="state-msg js-state-msg"></p>

          <p class="center js-xhr-button-container">
            <button class="xhr-button js-send-push-button mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
              Send a Push via XHR
            </button>
          </p>

          <div class="js-curl-container">
            <hr />
            <h4>CURL Command</h4>
            <p class="js-curl-copy-msg">Copy and paste the following CURL
            command into your terminal to send a push message to your
            browser.</p>
            <p class="js-curl-error-msg"></p>

            <p class="snippet-code">
              <code class="curl-code-example js-curl-code language-markup"></code>
            </p>
          </div>
			
          <div class="js-api-request">
            <hr />
            <h4>Push from a Server</h4>

            <p>To send a push message to this page, you need to make a network
            request from your server with the following pieces of info (this
            is essentially a breakdown of the CURL command above):</p>

            <h5>Endpoint URL</h5>

            <pre><code class="js-endpoint"></code></pre>

            <h5>Headers</h5>

            <div class="js-headers-list">
            </div>

            <h5>Request Body</h5>

            <p class="small-margin"><strong>Type</strong>: <span class="js-body-format"></span></p>

            <p  class="small-margin"><strong>Content</strong>: <span class="js-body-content"></span></p>
            <hr />
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

  
</body>
