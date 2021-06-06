	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
 $n1=$_POST['id'];
 $n2=$_POST['title'];
 $n3=$_POST['price'];
 $n4=$_POST['description'];
 $n5=$_POST['Display'];


	 
 $stmt=$db->prepare("UPDATE product SET title='$n2' , price=$n3, description='$n4' , display='$n5' where id=$n1 ");
 
 $stmt->execute();
header("location:../books.php");
exit();

?>