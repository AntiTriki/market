<?
session_name('livees'); 
session_start();
?>
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  

  <link rel="manifest" href="./manifest.json">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.indigo-pink.min.css">
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>

  <!-- Page styles -->
  <link rel="stylesheet" href="./styles/main.css">
</head>

  <script src="../../jquery-1.7.1.min.js"></script>
<script>
			function showUser(str,str2) {
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
			xmlhttp.open("GET","../../in_liveesnotify.php?d1="+str+"&d2="+str2,true);
			xmlhttp.send();
			}	
			}
			</script> 
<input type="text" id="id_dev"><br />
<input type="text" id="id_dev_bkp"><br />
<input type="text" id="txtHint"><br />
<input type="button" value="Guarda cambios" onClick="showUser(document.getElementById('id_dev').value,document.getElementById('id_dev_bkp').value)">

<body>
  
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    

    <main>
      <div class="push-switch-container js-push-switch-container">
        <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect js-push-toggle-switch" for="switch-2">
          <input type="checkbox" id="switch-2" class="mdl-switch__input" disabled>
          <span class="mdl-switch__label">Enable Push Notifications</span>
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

          <p><strong>Notes:</strong></p>
			
          <ul>
            <li>For more info on the encryption of payloads: <a href="https://developers.google.com/web/updates/2016/03/web-push-encryption?hl=en">Check out this link for info</a>.</li>
            <li>Not seeing a notification in Firefox? <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=1233086">This bug may be the culprit.</a> Check the logs for a note when the push is received though.</li>
            <li>Opera supports push on Android, but not on desktop and there is no feature detect for this :(. Bug has been filed on their private issue tracker.</li>
          </ul>
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
<br />

  
</body>
