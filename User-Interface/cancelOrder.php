<?php
try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	

if(isset($_POST["cancel_btn"]))
	{
		$id=$_POST["cancel_id"];	
	   echo $id;

          $exp=date("Y-m-d", strtotime("+1 week"));
$exp=date("Y-m-d");
 $stmt=$db->prepare("UPDATE transcationbook SET  	DeliveryDate =now() , OrderStatus='Order Cancelled' where OrderID ='$id' ");
 

 $stmt->execute();
header("location: profile.php");
exit();
	}
?>