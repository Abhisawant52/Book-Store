
<?php
try{
	
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');

	}
	catch(Exception $e){
		echo "Error has Occured";
	}
if(session_status() == PHP_SESSION_NONE) {
      session_start();
   }

if(isset($_POST['insertCart_btn'])==false){
if(isset($_SESSION['CustId'])==false){
	$_SESSION['LoginError'] = 'Please Login First !';
	header("location: index.php#msg-Content");
	exit;
}else{

	$insert_id=$_POST["insert_id"];
	$qun=$_POST["qun"];	
	$Cid=$_SESSION['CustId'];
	
	$query = $db->prepare( "select Cid , Pid from cart where Cid=$Cid AND Pid=$insert_id " );
	$query->execute();
	if( $query->rowCount() > 0 ) {
		$queryUpdate = $db->prepare( "update cart SET Quantity = Quantity + $qun where Cid=$Cid AND Pid=$insert_id " );
		$queryUpdate->execute();
	}else{
	$stmt = $db ->prepare("insert into cart values(null, $Cid , $insert_id , $qun)");
	$stmt -> execute();
	}
if(isset($_SESSION['cartCount'])==false){
	$_SESSION['cartCount']=1;
}
else{
$count=$_SESSION['cartCount'];
$count++;
$_SESSION['cartCount']=$count;
}
}
}
header("location: index.php#msg-Content");
?>
