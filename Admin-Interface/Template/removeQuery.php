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
$stmt=$db->prepare("Delete from admin where email= '$id' ");
 
 $stmt->execute();


header("location:../index.php");
exit();

 

?>