<?php
session_start();
include("connect.php");
$count='';
$error="";
if (!empty($_REQUEST)) {
   $user_email = $_REQUEST['email'];
   $pass = $_REQUEST['password'];
   $hashedpass=sha1($pass);
   $sql = "SELECT * from users where email ='$user_email' and password ='$pass' ";
   $x = $connect->prepare($sql);
   $y= $x->execute();
   $count = $x->rowCount();
   if ($count == 1) {
      $y = $x->fetchAll(PDO::FETCH_ASSOC);
      $userId = $y[0]["id"];
      $userName = $y[0]["name"];
      $_SESSION['userId'] = $userId;
      $_SESSION['userName'] = $userName;
      header("location: home.php");
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
         <form action="" method="POST" class="loginForm">

               <div class="form-group">
                  <input type="email" id="user_email" class="form-control" name="email" placeholder="Email"  required />
               </div>

               <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="password" />
                  <input type="hidden" name="id" value="<?= $y[0]["id"]?>">
               </div>
               <a href="./check-email.php">forgot password? </a>
                  <button class="tm-more-button" type="submit" name="submit">login</button>
               <a href=" adminlogin.php">login as admin</a>
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
