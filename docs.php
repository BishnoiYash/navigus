<?php
session_start();
header('Refresh:10');
$email1=$_GET['email'];
include "connection.php";
if(isset($_REQUEST['logout']))
{
	session_unset();
	session_destroy();
	$state=2;
	date_default_timezone_set("Asia/Calcutta");
    $times=date("Y-m-d h:i:sa");
	$sql2="update page set state='$state',times='$times' where email='$email1'";
	$query2=mysqli_query($cont,$sql2);
	echo "<script> location.href='index.php';</script>";
}
?>
<html>
<head>
	<title>Main Page</title>
	<style>
.container {
  width: 50px;
  height: 50px;
}

.image {
  opacity: 1;
  display: block;
  transition: .5s ease;
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 12px;
}
.logout{
	width: 100%;
	clear:both;
}
.wrapper{
	width:50px;
	height:50px;
	position: relative;
	float:left;
}
.nav
{
	width: 25%;
	height:100px;
}
.button{
    font-family: Poppins-Medium;
    font-size: 16px;
    width: 20%;
    height:50px;
    background: none; 
    background-color: #333;
    border: 2px solid #000;
    text-transform: uppercase;
    color: #fff;
  }
</style>
</head>
<body>
	<p>Welcome to doc page</p>
<div class="nav">
	<p>Currently vewing</p>
	<?php
if($_SESSION['email'])
{
 $sql="select * from page";
    $query=mysqli_query($cont,$sql);
    while($row=mysqli_fetch_array($query))
  { 
  	if($row['state']==1)
  	{
  		 $avtar=$row['avtar'];
    echo "<div class='wrapper'>";
    echo "<div class='container'>";
    	    echo "<img src='images/avatar$avtar.png' alt='Avatar' class='image'>";
    	    echo "<div class='middle'>";
    	    echo "<div class='text'>";
    	    echo $row['name'];
    	    echo "</div>";
    	    echo "</div>";
    echo "</div>";	
    echo "</div>";
  	}
  }
}
else if(!$_SESSION['email'])
echo "<script> location.href='index.php';</script>";
	?>
</div>
<div class="logout"></div>
<div class="nav">
	<p>Pastly viewed by </p>
	<?php
	date_default_timezone_set("Asia/Calcutta");
            $times=strtotime(date("Y-m-d h:i:sa"));
if($_SESSION['email'])
{
 $sql="select * from page";
    $query=mysqli_query($cont,$sql);
    while($row=mysqli_fetch_array($query))
  { 
  	if($row['state']==2)
  	{
  		 $avtar=$row['avtar'];
    echo "<div class='wrapper'>";
    echo "<div class='container'>";
    	    echo "<img src='images/avatar$avtar.png' alt='Avatar' class='image'>";
    	    echo "<div class='middle'>";
    	    echo "<div class='text'>";
    	    echo $row['name'];
    	    echo "<br>";
    	    $diff_timestamp=0;
    	    $a=strtotime($row['times']);
            $diff_timestamp=$times-$a;
             if($diff_timestamp<60){
  echo 'few seconds ago';
 }
 else if($diff_timestamp>=60 && $diff_timestamp<3600){
  echo round($diff_timestamp/60).' mins ago';
 }
 else if($diff_timestamp>=3600 && $diff_timestamp<86400){
  echo round($diff_timestamp/3600).' hours ago';
 }
 else if($diff_timestamp>=86400 && $diff_timestamp<(86400*30)){
  echo round($diff_timestamp/(86400)).' days ago';
 }
 else if($diff_timestamp>=(86400*30) && $diff_timestamp<(86400*365)){
  echo round($diff_timestamp/(86400*30)).' months ago';
 }
 else{
  echo round($diff_timestamp/(86400*365)).' years ago';
 }
    	    echo "</div>";
    	    echo "</div>";
    echo "</div>";	
    echo "</div>";
  	}
  }
}
else if(!$_SESSION['email'])
echo "<script> location.href='index.php';</script>";
	?>
</div>
<div class="logout">
	<form action="#" method="post">
		<input type="submit" name="logout" value="Logout" class="button">
	</form>
</div>
</body>
</html>
