<html>
<head>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("images/loginback.jpg ");

  /* Full height */
  height: 100%; 
  margin: 0;
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  overflow: hidden;
  }
  .container{
    width: 30%;
    position: absolute;
    background-color:white;
    left:35%;
    top:5%;
    padding: 0px;
    height: 90%;
    bottom: 5%;
    border-radius: 2%;
  }  
  h1{
    padding: 20px;
    font-family: Poppins-Bold;
    text-align:center;
    margin: 0px;
  font-size: 49px;
  }
  .wrap{
    width:100%;
    margin:10%;
    font-size: 24px;
    font-family: Poppins-Regular,sans-serif;
    overflow: hidden;
  }
  .lable-input{
    font-family: Poppins-Regular;
    color: #333;
  }
  .input{
    border:none;
    margin-right: 0px;
    outline: none;
    overflow: visible;
    border-bottom: 2px solid #333; 
    width:80%;
    font-family: Poppins-Medium;
    font-size: 16px;
    color: #333;
    line-height: 1.2;
    display: block;
    height: 55px;
    background: 0 0;
  }
  .a1{
    width: 86%;
    margin:7%;
    text-align: right; 
  }
  .a2{
    text-decoration: none;
    font-family: Poppins-Medium;
    font-size: 16px;
    color: #333;
  }
  .login{
    width: 100%;
    text-align: center;
    text-decoration: none;
  }
  .button{
    font-family: Poppins-Medium;
    font-size: 16px;
    width: 80%;
    padding:2%;
    background: none; 
    background-color: #333;
    border: 2px solid #000;
    text-transform: uppercase;
    color: #fff;
  }
  .other{
    width: 100%;
    text-align: center;
    font-family: Poppins-Medium;
    font-size: 16px;
    color: #333;
    padding-top: 34px;
  }
  .social
  {
    border-radius: 50%;
  }
</style>
</head>
<body>

<div class="bg">
  <form action="#" method="post" class="container">
    <h1>Login</h1>
    <div class="wrap">
      <span class="lable-input">Username</span>
      <input type="text" placeholder="Enter Email" name="email"  required class="input">
    </div>
    <div class="wrap">
      <span  class="lable-input">Passcode</span>
      <input type="password" placeholder="Enter Passcode" name="passcode"  required class="input">
    </div>
    <div class="a1">
      <a href="forget.php" class="a2">Forget passcode?</a>
    </div>
    <div class="login">
        <input type="submit"  name="login"  value="Login" class="button">
    </div>
    <div class="other">
      <span>Or Sign Up here</span>
       <input type="submit"  name="register"  value="Register" class="button">
    </div>
    
  </form>
</div>

</body>
</html>
<?php
  
  if(isset($_POST['login']))
{
  include "connection.php";
  $sql="select * from page";
    $query=mysqli_query($cont,$sql);
  $email=$_POST['email'];
  $passcode=$_POST['passcode'];
  $x=0;
  while($row=mysqli_fetch_array($query))
  { 

         if($email==$row['email'] && $passcode==$row['passcode'])
    {
      $email=$row['email'];
      $state=1;
      $x=1;
      session_start();
      $_SESSION['email']=$email; 
      $sql2="update page set state='$state' where email='$email'";
      $query2=mysqli_query($cont,$sql2);
      header("location:docs.php?email=$email");
    }
  }
  if($x==0)
  {
    echo "<script>alert('username or password incorrect or you are not registered')</script>";
  }
}
if(isset($_POST['register']))
{
  $email=$_POST['email'];
    header("location:register.php?email=$email");
}
?>