<?php

	session_start();
    $errors=array();
	try{
	
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');

	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
if(isset($_POST['submit'])){
 echo $k1=$_POST['email'];
 echo $k2=$_POST['password1'];
 
	 
 $stmt= $db->query("select * from customer where email='$k1' ");
 $stmt->execute();
while($row=$stmt->fetch()){
 	$str_pass=$row['pass'];
	$pass_check=password_verify($k2,$str_pass);
	if($pass_check)	{ 
		$custid=$row['Cid'];
	}

}
 if(isset($custid)){
 session_start();
 $_SESSION['CustId'] = $custid;
 unset($_SESSION['LoginError']);
 header('location:../index.php');
 }
 else{
		$_SESSION['errorUser'] = "<h4>Invalid email and password<h4>";
		header('location:login.php');
		
 }
 
}
if(isset($_POST['submitRegister'])){
	echo $k1=$_POST['email'];
    echo $k2=$_POST['password1'];
	echo $k3=$_POST['name'];

$query = $db->prepare( "select email from customer where email='$k1'  " );

$query->execute();

if( $query->rowCount() > 0 ) { # If rows are found for query
    $_SESSION['RegistererrorUser'] = "<h4>Email is Already registerd !!\n try with Other email.<h4>";
	header('location:register.php');
}
else {
 $pass=password_hash($k2,PASSWORD_BCRYPT);
 $stmt=$db->prepare("insert into customer values(null,'$k3','$k1','$pass' ,now())");
 $stmt->execute();
 unset($_SESSION['error']);
 header('location:login.php');
}	
	
}
?>

