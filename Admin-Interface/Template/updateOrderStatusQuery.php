	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
 echo $id=$_POST['update_id'];
 echo  $status=$_POST['Display'];
 

if($status == 'Delivered'){
 $stmt=$db->prepare("UPDATE transcationbook SET OrderStatus='$status', DeliveryDate=now() where 	OrderID ='$id' ");
}
else{
 $stmt=$db->prepare("UPDATE transcationbook SET OrderStatus='$status'  where OrderID ='$id' ");
}
 $stmt->execute();
 
 
header("location:../orderstatus.php");
exit();

?>