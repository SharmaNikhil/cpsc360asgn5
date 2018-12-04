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
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'A', 'password':'<?php echo $_POST['password']; ?>'})">A</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'B', 'password':'<?php echo $_POST['password']; ?>'})">B</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'C', 'password':'<?php echo $_POST['password']; ?>'})">C</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'D', 'password':'<?php echo $_POST['password']; ?>'})">D</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'E', 'password':'<?php echo $_POST['password']; ?>'})">E</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'F', 'password':'<?php echo $_POST['password']; ?>'})">F</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'G', 'password':'<?php echo $_POST['password']; ?>'})">G</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'H', 'password':'<?php echo $_POST['password']; ?>'})">H</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'I', 'password':'<?php echo $_POST['password']; ?>'})">I</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'J', 'password':'<?php echo $_POST['password']; ?>'})">J</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'K', 'password':'<?php echo $_POST['password']; ?>'})">K</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'L', 'password':'<?php echo $_POST['password']; ?>'})">L</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'M', 'password':'<?php echo $_POST['password']; ?>'})">M</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'N', 'password':'<?php echo $_POST['password']; ?>'})">N</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'O', 'password':'<?php echo $_POST['password']; ?>'})">O</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'P', 'password':'<?php echo $_POST['password']; ?>'})">P</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'Q', 'password':'<?php echo $_POST['password']; ?>'})">Q</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'R', 'password':'<?php echo $_POST['password']; ?>'})">R</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'S', 'password':'<?php echo $_POST['password']; ?>'})">S</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'T', 'password':'<?php echo $_POST['password']; ?>'})">T</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'U', 'password':'<?php echo $_POST['password']; ?>'})">U</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'V', 'password':'<?php echo $_POST['password']; ?>'})">V</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'W', 'password':'<?php echo $_POST['password']; ?>'})">W</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'X', 'password':'<?php echo $_POST['password']; ?>'})">X</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'Y', 'password':'<?php echo $_POST['password']; ?>'})">Y</button>
<button class="tabLinks" onclick="post( 'dictionary.php', {'letter':'Z', 'password':'<?php echo $_POST['password']; ?>'})">Z</button>
<button class="tabLinks" onclick="openTab( event, 'Admin'  )">Admin</button>
</form>
</div>

<script>
  $("button").filter(function() {
    return $(this).text() === "Admin";
}).addClass("active")
</script>

<div id='Home' class='tabContent'>
<h3>Words Galore!</h3>
<p>Welcome to Words Galore! where you can read, search and upload words from a text file.</p>
</div>

<div id='Admin' class='tabContent' active style="display:block">
<b><h3>Admin</h3>
<h3>Deleting data</h3></b>
<?php
    $db = new mysqli('localhost','wordsroot', $_POST['password'],'words');
    $sql = "DELETE ALL FROM entry";
    $db->query($sql);
    ?>
<p>All Data Deleted!</p>
<form enctype="multipart/form-data" action = "password.php" method = "post">
    <input type="hidden" name="password" id="passwordField" value=<?= $_POST['password'] ?> />
    <input type="submit" value="Back to Admin"/>
</form>
</div>

</body>

</html>
