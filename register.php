<?php
$email1=$_GET['email'];
include "connection.php";
$sql="select * from page";
    $query=mysqli_query($cont,$sql);
    while($row=mysqli_fetch_array($query))
  { 

         if($email1==$row['email'])
    {
  	$email="email exists";
  	header("location:register.php?email=$email");
    }
  }
if(isset($_POST['sub']))
{
$name=$_POST['username'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$avtar=$_POST['avtar'];
$state=$_POST['state'];
date_default_timezone_set("Asia/Calcutta");
$times=date("Y-m-d h:i:sa");
$sql="insert into page values('$name','$lastname','$email','$pass','$avtar','$state','$times')";
$query=mysqli_query($cont,$sql);
if(isset($query))
{
	echo "executed"."<br>";
}
else
{
	echo "sorry";
}
header("location:index.php");
}
?>
<html>
<head>
	<title>REGISTER/LOGIN</title>
	<style>
		body {
    font-size: 12px;
    font-family: Verdana, Arial;
             }
		table{
			width: 100%;
		}
		.trmain{
			font-size: 12px;
			background-color: #5260b2;
			color: #fff; 
			padding: 1px;
			text-align: left;
			font-weight: bold;
		}
		.tdfont {
    text-align: left;
    background-color: #FEF3E9;
    padding: 1px;
    width: 25%;
                }
                .tdfonthead {
                	font-size: 12px;
    text-align: right;
    background-color: #c2dfe7;
    width: 25%;
                            }	
    input {
    width: 50%;
    padding: 2px;
    border: 1px; 
           }    
               .avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

  	</style>
</head>
<body>
<form action="#" method="post">
	<table>
	<tr>
		<td class="trmain" colspan="4">Personal details</td>
    </tr>
	<tr>
		<td class="tdfonthead">FIRST NAME</td>
		<td class="tdfont"><input type="text" name="username" maxlength="30" required></td>
		<td class="tdfonthead">Last Name</td>
		<td class="tdfont"><input type="text" name="lastname" required></td>
	</tr><!--first row end-->
	
	<tr>
		<td class="trmain" colspan="4">USERINFO</td>
	</tr>
	<tr>
		<td class="tdfonthead">Email</td>
		<td class="tdfont"><input type="email" name="email" maxlength="30" value="<?php echo $email1;?>"></td>
		<td class="tdfonthead">Passcode</td>
		<td class="tdfont"><input type="text" name="pass" maxlength="30" required></td>
	</tr>
	<tr>
		<td class="tdfonthead">Avatar</td>
		<td class="tdfont">
			<select name="avtar" required>
				<option value="1" selected="selected">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</td>
		<td class="tdfonthead">Active State</td>
		<td class="tdfont">
			<select name="state" required>
				<option value="0" selected="selected">0</option>
			</select>
		</td>
	</tr><!--second row end-->	
	</table>
	<div>
		<img src="images/avatar1.png" alt="Avatar1" class="avatar">
		<img src="images/avatar2.png" alt="Avatar2" class="avatar">
		<img src="images/avatar3.png" alt="Avatar3" class="avatar">
		<img src="images/avatar4.png" alt="Avatar4" class="avatar">
		<img src="images/avatar5.png" alt="Avatar5" class="avatar">
	</div>
	<p>Choose your avatar from avatar list according to image showen. </p>
	<input type="submit" name="sub" value="Register">
	<p>After clicking on register and executed go to login page by clicking on login button for login to website</p>
</form>
</body>
</html>
