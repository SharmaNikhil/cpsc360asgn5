<html>

<head>
<title>Words Galore!</title>
<style type="text/css">
@import url(iwords.css);
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language=JavaScript>
function verify( form, name ) {
  var text = form.elements[ name ];

  if ((text.value != null) && (text.value != "")) {
    return true;
  }
  alert("Input cannot be empty.");
  return false;
}

function verfiy(form){
    file = form.elements["uploaded"];
    if((file.value != null) && (file.value != "")){
        return confirm("Uploading Data file " + file.value );
    }
    alert("The filename cannot be empty.");
    return false;
}

function verfiy2(form){
    return confirm("All data will be deleted. Proceed? " );
}

//
// based on: <https://www.w3schools.com/howto/howto_js_tabs.asp>
//
function openTab( event, id ) {
    // Get all elements with class="tabContent" and hide them
    tabContent = document.getElementsByClassName( "tabContent" );
    for (i = 0; i < tabContent.length; i++) {
        tabContent[i].style.display = "none";
    }

    // Get all elements with class="tabLinks" and remove the class "active"
    tabLinks = document.getElementsByClassName( "tabLinks" );
    for (i = 0; i < tabLinks.length; i++) {
        tabLinks[i].className = tabLinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById( id ).style.display = "block";
    event.currentTarget.className += " active";
}

//
// based on: <https://stackoverflow.com/questions/133925/javascript-post-request-like-a-form-submit>
//
function post( file, map ) {
   var form = document.createElement("form");
   form.setAttribute( "method", "post");
   form.setAttribute( "action",  file );

   for (var key in map) {
       var hiddenField = document.createElement( "input" );
       hiddenField.setAttribute( "type", "hidden");
       hiddenField.setAttribute( "name",  key );
       hiddenField.setAttribute( "value", map[ key ]);

      form.appendChild( hiddenField );
    }
    document.body.appendChild( form );
    form.submit();
}

function tryAgain(event) {
  var button = document.getElementById("TryAgainButton");
  button.click();
}

</script>
</head>

<body>
<div class="tab">
  <button class="tabLinks" onclick="tryAgain(event)">Home</button>
  <button class="tabLinks" onclick="tryAgain(event)">A</button>
  <button class="tabLinks" onclick="tryAgain(event)">B</button>
  <button class="tabLinks" onclick="tryAgain(event)">C</button>
  <button class="tabLinks" onclick="tryAgain(event)">D</button>
  <button class="tabLinks" onclick="tryAgain(event)">E</button>
  <button class="tabLinks" onclick="tryAgain(event)">F</button>
  <button class="tabLinks" onclick="tryAgain(event)">G</button>
  <button class="tabLinks" onclick="tryAgain(event)">H</button>
  <button class="tabLinks" onclick="tryAgain(event)">I</button>
  <button class="tabLinks" onclick="tryAgain(event)">J</button>
  <button class="tabLinks" onclick="tryAgain(event)">K</button>
  <button class="tabLinks" onclick="tryAgain(event)">L</button>
  <button class="tabLinks" onclick="tryAgain(event)">M</button>
  <button class="tabLinks" onclick="tryAgain(event)">N</button>
  <button class="tabLinks" onclick="tryAgain(event)">O</button>
  <button class="tabLinks" onclick="tryAgain(event)">P</button>
  <button class="tabLinks" onclick="tryAgain(event)">Q</button>
  <button class="tabLinks" onclick="tryAgain(event)">R</button>
  <button class="tabLinks" onclick="tryAgain(event)">S</button>
  <button class="tabLinks" onclick="tryAgain(event)">T</button>
  <button class="tabLinks" onclick="tryAgain(event)">U</button>
  <button class="tabLinks" onclick="tryAgain(event)">V</button>
  <button class="tabLinks" onclick="tryAgain(event)">W</button>
  <button class="tabLinks" onclick="tryAgain(event)">X</button>
  <button class="tabLinks" onclick="tryAgain(event)">Y</button>
  <button class="tabLinks" onclick="tryAgain(event)">Z</button>
  <button class="tabLinks" onclick="tryAgain(event)">Admin</button>
  </form>
</div>

<div id='Home' class='tabContent'>
  <h3>Words Galore!</h3>
  <p>Welcome to Words Galore! where you can read, search and upload words from a text file.</p>
</div>

<div id='Admin' class='tabContent' active style="display:block">
  <h3>Admin</h3>

  <?php

    // session_start(); 
    ini_set('display_errors','0');
    
    $username = 'wordsroot';
    $password = $_POST['password'];

    $_SESSION['varName'] = $password;
    
    
    $conn = mysqli_connect('localhost',$username, $password,'words');
    if($conn){
      //header('Location: ./uploader.html'); //I think this should change to uploadData.php
        echo '<p><b> Upload Data </b></p><form enctype="multipart/form-data" action="upload.php" onsubmit = "return verfiy(this);" method="post"><input type="hidden" name="MAX_FILE_SIZE" value="10000000"/><input type="file" name="uploaded" size="300"/><input type="submit" value="Upload" /></form><p></p><p><b> Delete Data </b></p><form action = "delete.php" method = "post"onsubmit = "return verfiy2(this);"><input type="submit" value="Delete"/></form><p></p><button onclick="refresh">Log out</button>';
    }else{
        die('<b>Incorrect Password</b><br><a style="text-decoration:none" href="./" id="TryAgainButton"><button onclick="refresh">Try Again</button></a>');
    }
  ?>
</div>

</body>

</html>
