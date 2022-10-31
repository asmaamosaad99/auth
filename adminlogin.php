<?php
session_start();
require('db.php');
$count = '';
$error = "";
if (isset($_POST) & !empty($_POST)) {
   $admin_email = $_POST['email'];
   $pass = $_POST['password'];
   //  $hashedpass=sha1($pass);

   $stmt = $connect->prepare('SELECT * from admin where email =? and password= ?');
   $stmt->execute(array($admin_email, $pass));

   $count = $stmt->rowCount();
   if ($count == 1) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $adminid = $row['id'];
      // var_dump($adminid);
      $_SESSION['login_user'] =$admin_email;
      $_SESSION['admin_id'] = $adminid;

      header("location:showusers.php");
   } else {
      $error = "Your Login Email or Password is invalid";
   
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <link href="css/templatemo-style.css" rel="stylesheet">
   <link href="css/loginstyle.css" rel="stylesheet">
   <title>Document</title>

</head>

<body>
   <section class="loginFormContainer">
      <div class="formWrapper">
         <img class="image" src=" ../img/favicon.ico" />

         <h2 class="margin-bottom-30 text-center">Login</h2>
         <form action="" method="post" class="loginForm">

               <div class="form-group">
                  <input type="email" id="user_email" class="form-control" name="email" placeholder="Email"  required />
               </div>

               <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="password" />
               </div>

                  <button class="tm-more-button" type="submit" name="submit">login</button>
               

               <a href="check-email.php">forgot password? </a>  
        


         </form>
         <div style = "font-size:11px; color:#cc0000; margin-top:10px">
                  <?php

                  if($count==0) {
                     echo $error;
                  }  
                   
                   ?>

               
               </div>

      </div>
   </section>
</body>

</html>
