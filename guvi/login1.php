<?php
//index.php
// session_start();
if(isset($_SESSION["email"]))
{
 header("location:profile.php");
}
?>
<html>
 <head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Guvi</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
  <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
  <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

 </head>
 <body style="background-color:#CBD5F0">
  <div class="container">
   <div id="box">
    <br />
    <form method="post">
      <h2>Login</h2>
     <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" id="email" class="form-control" />
     </div>
     <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" id="password" class="form-control" />
     </div>
     <div class="form-group">
      <input type="button" name="login" id="login" class="btn btn-success" value="Login" />
     </div>
     <div class="text-center">Not an user?<a href="register.php">Sign Up</a></div>
     <div id="error"></div>
    </form>
    <br />
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('#login').click(function(){
  var email = $('#email').val();
  var password = $('#password').val();
  if($.trim(email).length > 0 && $.trim(password).length > 0)
  {
   $.ajax({
    url:"loginProcess.php",
    method:"POST",
    data:{email:email, password:password},
    cache:false,
    beforeSend:function(){
     $('#login').val("connecting...");
    },
    success:function(data)
    {
     if(data)
     {
       window.location.href = "profile.php";
      //$("body").load("profile.php").hide().fadeIn(1500);
     }
     else
     {
      var options = {
       distance: '40',
       direction:'left',
       times:'3'
      }
      $("#box").effect("shake", options, 800);
      $('#login').val("Login");
      $('#error').html("<span class='text-danger'>Invalid email or Password</span>");
     }
    }
   });
  }
  else
  {

  }
 });
});
</script>
