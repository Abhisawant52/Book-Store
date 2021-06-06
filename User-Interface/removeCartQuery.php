	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
if(isset($_POST["removeAll_btn"]))
	{
	$id=$_POST["remove_id"];	
 	$stmt=$db->prepare("Delete  from cart where Cid=$id ");
 	$stmt->execute();
header("location:cart.php");
exit();
}
if(isset($_POST["remove_btn"]))
	{
	$cid=$_POST["remove_cid"];
 	$id=$_POST["remove_id"];	
 	$stmt=$db->prepare("Delete  from cart where id=$id AND Cid=$cid ");
 	$stmt->execute();
header("location:cart.php");
exit();
}
?>