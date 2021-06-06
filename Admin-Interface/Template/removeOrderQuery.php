	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
if(isset($_POST["remove_btn"]))
	{
		$id=$_POST["remove_id"];	
	    echo $id;
	}
$stmt=$db->prepare("Delete from  transcationbook where 	OrderID  ='$id' ");
 
 $stmt->execute();
$st=$db->prepare("Delete from  orderlist where 	OrderID ='$id' ");
 
$st->execute();

header("location:../bookorders.php");
exit();

 

?>