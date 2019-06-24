<?php
    include('login.php'); // Includes Login Script
    if(isset($_SESSION['login_user'])){
    header("location: index.php"); // Redirecting To Profile Page
    }
    ?> 
    <!DOCTYPE html>
    <html>
    <head>
      <title>Login Form in PHP with Session</title>
      <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
     <div id="login">
      <center><h2>Login Form</h2></center>
      <center><form action="" method="post">
       <label>UserName :</label>
       <input id="name" name="username" placeholder="username" type="text"></br>
       </br>
       <label>Password :</label>
       <input id="password" name="password" placeholder="**********" type="password"><br><br>
       <input name="submit" type="submit" value=" Login ">
       <span><?php echo $error; ?></span>
      </form></center>
     </div>
    </body>
    </html>