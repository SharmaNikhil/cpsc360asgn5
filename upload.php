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
  <button class="tabLinks" onclick="openTab( event, 'Home' )">Home</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'A'})">A</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'B'})">B</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'C'})">C</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'D'})">D</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'E'})">E</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'F'})">F</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'G'})">G</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'H'})">H</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'I'})">I</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'J'})">J</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'K'})">K</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'L'})">L</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'M'})">M</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'N'})">N</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'O'})">O</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'P'})">P</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'Q'})">Q</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'R'})">R</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'S'})">S</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'T'})">T</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'U'})">U</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'V'})">V</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'W'})">W</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'X'})">X</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'Y'})">Y</button>
  <button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'Z'})">Z</button>
  <button class="tabLinks" onclick="openTab( event, 'Admin'  )">Admin</button>
  </form>
</div>

<div id='Home' class='tabContent'>
  <h3>Words Galore!</h3>
  <p>Welcome to Words Galore! where you can read, search and upload words from a text file.</p>
</div>

<div id='Admin' class='tabContent' active style="display:block">
  <b><h3>Admin</h3>
  <h3>Uploading data</h3></b>
<?php
    ini_set('display_errors','1');
    $password = $_POST['password'];
    $okay=true;
    //was the file uploaded?
//    echo implode("|",$_FILES['uploaded']);
//    echo $_FILES['uploaded']['name'];
    if($_FILES['uploaded']['error']>0){
        echo'A problem was detected:<br/>';
        switch($_FILES['uploaded']['error']){
            case 1:echo '* File exceeded maximum size allowed by server.<br/>';break;
            case 2:echo '* File exceeded maximum size allowed by application.<br/>';break;
            case 3:echo '* File could not be fully uploaded.<br/>';break;
            case 4:echo '* File was not fully uploaded.<br/>';break;
        }
        $okay=false;
    }
    //is the mime type correct?
    if($okay && $_FILES['uploaded']['type'] != 'text/plain'){
        echo 'A problem was detected:<br/>';
        echo '* File is not a text file. <br/>';
        $okay = false;
    }
    //can the file be moved to my folder?
    $filename = 'file.txt';
    if($okay){
        if    (is_uploaded_file($_FILES['uploaded']['tmp_name'])){
            if    (!move_uploaded_file($_FILES['uploaded']['tmp_name'], $filename)){
                echo 'A    problem    was    detected:</br>';
                echo '*    Could not copy file    to final destination.<br/>';
                $okay = false;
            }
        }
        else {
            echo 'A problem was detected:</br>';
            echo '* File to copy is not an uploaded file.</br>';
            $okay = false;
        }
    }
    if($okay){
        $db = new mysqli('localhost','wordsroot', $password,'words');
        
        set_time_limit(600);
        echo 'File uploaded successfully.';
        $file = fopen($filename, 'r');
        $entry;
        $wordCount=0;
        $read = false;
        while(!feof($file)){
            $line = fgets($file);
            if ($line[0] === '-') {
                $read = true;
                continue;
            }
            if ($read) {
                $sql = "INSERT INTO `wordsTable`(`entry`) VALUES ('$line')";
                if($db->query($sql)){$wordCount++;}
            }
            }
        fclose($file);
        }
    echo '<form enctype="multipart/form-data" action = "password.php" method = "post"><input type="hidden" name="password" value="$password"/><input type="submit" value="Back to Admin"/></form>';
    ?>
</div>

</body>

</html>
