<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN"
            "http://www.w3.org/TR/REC-html40/strict.dtd">
<html>
<head>
<title>uMovies :: Movies</title>
<style type="text/css">
@import url(uMovies.css);
</style>
</head>
<body>

<div id="links">
<a href="./">Home<span> Access the database of movies, actors and directors. Free to all!</span></a>
<a href="admin.html">Administrator<span> Administrator access. Password required.</span></a>
</div>



<div id="content">
<h1>uMovies&trade;</h1>
<p>
Welcome to <em>uMovies</em>, your destination for information on <a href="movies.php" title="access movies information">movies</a>, <a href="actors.php" title="access actors information">actors</a> and <a href="directors.php" title="access directors information">directors</a>.
</p>

<h2>Administrator Access</h2>
<?php

  session_start(); 
   
     // go to other

    // second script
    
  ini_set('display_errors','0');
  
  $passWord = $_POST['password'];

   $_SESSION['varName'] = $passWord;

  
  /*
  if($passWord === 'password'){
    header('Location: uploader.html');
  }else{
    echo 'Password Incorrect';
  }
  */
  
  
  $conn = mysqli_connect('localhost','uMoviesRoot', $passWord,'uMovies');
  if($conn){
    header('Location: uploader.html');
    
  }else{
    die('<b>Incorrect Password</b><p><copyright>Roberto A. Flores &copy; 2017</copyright></p>');
  }
  
?>
<p><copyright>Roberto A. Flores &copy; 2017</copyright></p>
</div>

</body>
</html>