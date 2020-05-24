<?php
$host="ec2-50-17-90-177.compute-1.amazonaws.com";
$user="wrxdynhwnymdiy";
$password="78317618e3b727c8101e506d53ee0e3402f84e421c69d6849d312f60c4714172";
$Database="d223i1n3urqin6";
$port="5432";

$cont=mysqli_connect($host,$user,$password,$Database);
if(isset($cont))
{

}
else
{
	echo "not connected";
}
?>