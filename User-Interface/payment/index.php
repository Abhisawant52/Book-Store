<!DCTYPE html>
<html>
<head>
<title></title>
<?php session_start(); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}

$custID= $_SESSION['CustId']; 

$firstname=strtoupper($_POST['fname']);
$lastname=strtoupper($_POST['lname']);
$name=$firstname." ".$lastname;



$Address1=$_POST['add1'];
$Address2=$_POST['add2'];
$City=strtoupper($_POST['city']);
$state=strtoupper($_POST['state']);
$code=$_POST['Zipcode'];
$country=strtoupper($_POST['country']);
$Address=" <br>".$Address1." <br>".$Address2."<br>".$City." ".$state."<br> ZipCode:".$code." ".$country." ";

$email=$_POST['Email'];
$mno=$_POST['nummobile'];
$contact="<br>Mobile No: ".$mno."<br>Email: ".$email;

$Amount=$_POST['TXN_AMOUNT'];
$OrderId=$_POST['ORDER_ID'];

$_session['savedBook']=$_POST['ORDER_ID'];


$stmt=$db->prepare("insert into transcationbook values('$OrderId',$custID,'$name','$Address','$contact',$Amount,NULL,NULL,NULL,NULL,NULL)");
$stmt->execute();

?>
<div class="Container text-center">
<div class="row text-center">
<div class="col-md-12">
<h1>Press Continoue Button Toredirect Payment Pgae</h1>

</div></div>


 <form method="post" action="pgRedirect.php"  > 
 
<div style="display:none;">
    
<input id="ORDER_ID"   name="ORDER_ID" value="<?php echo $_POST['ORDER_ID'];?>">					
<input id="CHANNEL_ID" name="CHANNEL_ID"  value="WEB">
<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID"  value="CUST001">  
<input id="INDUSTRY_TYPE_ID" name="INDUSTRY_TYPE_ID"  value="Retail">
<input title="TXN_AMOUNT"  tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $_POST['TXN_AMOUNT'] ?>">

</div>
 
 <button type="submit" name="submit" value="submit" class="btn btn-outline-success"/>Continue  Payment</button>

 </form>
</div>
</body>
</html>