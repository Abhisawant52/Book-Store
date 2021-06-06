	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 

 $title=$_POST['title'];
 $price=$_POST['price'];
 $description=$_POST['description'];
 $file=$_FILES['photo'];
 //PRINT_R( $file);
 
 $filename= $file['name'];
 $filepath= $file['tmp_name'];
 $fileerror= $file['error'];
 if($fileerror == 0){
 $destfile= '../../pic/book/'.$filename;
 //ECHO  $destfile;
 
 move_uploaded_file($filepath, $destfile);
 } 
 $stmt=$db->prepare("insert into product values(null,'$title', $price , '$description','$filename',now(),'NO')");
 $stmt->execute();
 
header("location:../books.php");
exit();
?>