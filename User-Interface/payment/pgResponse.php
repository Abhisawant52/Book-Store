<!DOCTYPE html>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/styleInvoice.css">
</head>
<body>
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
?>
<header>
<H1>Shopping details:</H1>
<img src="../../pic/logo1.png" width=200px; height=70px;>
</header>

<div class="main-container shadow bg-white rounded">

<?php if($isValidChecksum == "TRUE") { ?>


<div class="main-header">
<h3><b>Enrollment details:</b></h3>
<button type="button" class="btn btn-primary"onclick="myFunction()">Print Acknowledgement</button>
</div>
<?php
if ($_POST["STATUS"] == "TXN_SUCCESS") { ?>
<div class="transcation-status" style="color:green">
<h5><b>Transaction status is success</b></h5>
</div>
<?php  }else{ ?>
<div class="transcation-status" style="color:red">
<h5><b>Transaction status is failure</b></h5>
</div>
<?php } ?>
<div class="billing-content">
<div>
<h4>Shipping details:</h4>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	$ORDERID=$_POST['ORDERID'];
	$stmt= $db->query("select * from transcationbook where OrderId='$ORDERID'");
	while($row=$stmt->fetch()){	
	echo $row['name'] ."<br>Address:". $row['Address']."<br>Contact Details:".$row['contactDetail'].
"<br>Payment: ".$row['price'];
 $Cid= $row['Cid'];
	}
?>
</div>
<div>
<h4>Payment Info:</h4>

<?php
	if (isset($_POST) && count($_POST)>0 )
	{ 
		echo "order Id = " . $_POST['ORDERID']."<br/>";
		echo "PAYTM_MERCHANT_MID = " . $_POST['MID']."<br/>";
		echo "Trascation ID = " .$_POST["TXNID"]."<br/>";
		echo "Trascation STATUS = " .$_POST["STATUS"]."<br/>";
		echo "Trascation Amount =  " .$_POST["TXNAMOUNT"]."<br/>";
		echo "CURRENCY = " .$_POST["CURRENCY"]."<br/>";
		echo "Trascation Date = " .$_POST["TXNDATE"]."<br/>";
		echo "PAYMENT MODE =" .$_POST["PAYMENTMODE"]."<br/>";
		echo "BANK NAME =" .$_POST["BANKNAME"]."<br/>";
		echo "BANKTXN ID = " . $_POST['BANKTXNID']."<br/>";
		 //$n1=$_POST['ORDERID'];
		 $MID=$_POST['MID'];
		 $TXNID=$_POST['TXNID'];
		 $STATUS=$_POST['STATUS'];
		 $TXNAMOUNT=$_POST['TXNAMOUNT'];
		 $CURRENCY=$_POST["CURRENCY"];
		 $TXNDATE=$_POST["TXNDATE"];
		 $PAYMENTMODE=$_POST['PAYMENTMODE'];
		 $BANKNAME=$_POST['BANKNAME'];
		 $BANKTXNID=$_POST['BANKTXNID'];
		 $details="order Id =".$ORDERID."<br>PAYTM_MERCHANT_MID = ".$MID."<br>Trascation ID = " .$TXNID."<br>Trascation STATUS = " .$STATUS.
		     "<br>Trascation Amount =  ".$TXNAMOUNT."<br>CURRENCY = ".$CURRENCY."<br>Trascation Date = ".$TXNDATE."<br>PAYMENT MODE =".$PAYMENTMODE.
			 "<br>BANK NAME =".$BANKNAME."<br>BANKTXN ID = ".$BANKTXNID;
		$exp=date("Y-m-d", strtotime("+1 week"));
if ($_POST["STATUS"] == "TXN_SUCCESS") { 
$statusTXN='Order Confirmed'; }
else{
	$statusTXN='Order Cancelled';
}
try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
 $stmt=$db->prepare("UPDATE  transcationbook SET PaymentInfo='$details' ,txnStatus='$STATUS' , exceptDate='$exp'  , OrderStatus='$statusTXN' , DeliveryDate=now() where  OrderId='$ORDERID' ");
 $stmt->execute();

	}
?>
</div>
</div> <!-- Billing content -->
<?PHP 
if ($_POST["STATUS"] == "TXN_SUCCESS") { ?>



<div class="order-summary">
<h2><b>Order Summary:</b></h2>
<?php
$stmt= $db->query("select * from cart where cid= $Cid ");
while($row=$stmt->fetch()){	
 $pid=$row['Pid'];
 $quantity=$row['Quantity'];
 $st=$db->prepare("insert into orderlist values('$ORDERID','$Cid','$pid','$quantity') ");
 $st->execute();
}
$stmt=$db->prepare("Delete from cart where Cid= $Cid ");
 $stmt->execute();
?>


<table class="table table-hover ">
 <tr>             
	<td class="col-sm-8 col-md-6"><b> Product </b> </td>
	<td><b>Seats</b></td>
	<td><b>Price</b></td>
	<td colspan="2"><b>Total</b></td>
</tr>
<?php
	
	
	
	$stmt= $db->query("select product.title AS Title ,product.price AS price,product.description AS description,
	product.image AS image, product.price* orderlist.Quantity AS totalAmount,
	orderlist.Quantity AS Quantity
	FROM  orderlist LEFT JOIN product ON  orderlist.Pid=product.id WHERE  orderlist.OrderID='$ORDERID' ");
	while($row=$stmt->fetch()){	
?> 
<tr>
  <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img src="../../pic/book/<?php echo $row['image']." " ?>" alt="" style="width:72px; height: 72px;"></a>
                            <div style="padding-left: 10px;" class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $row['Title']." " ?></a></h4>
                                <p><?php echo  substr( $row['description'], 0, 60) . '...'; ?></p>
                            </div>
                        </div>
    </td>
<td><P><?php echo $row['Quantity']?>Pies</p></td>
	<td><?php echo $row['price']." " ?></td>
	<td colspan="2"><?php echo $row['totalAmount'] ?></td>
</tr>


	<?php } ?>
</table>
</div>

<div class="order-status">
<h2><b>Order Status :</b></h2>
</div>
<div class="status-container">
<div  class="content1">
<div class="content-icons">
<i class="fa fa-thumbs-o-up fa-2x green"></i><span class="join green"></span>
<i class="fa fa-tags fa-2x i gray"></i><span class="join"></span>
<i class="fa fa-truck fa-2x i fa-flip-horizontal gray"></i><span class="join"></span>
<i class="fa fa-check-square-o fa-2x i gray" ></i>
</div>
<div class="content-title">
<span>Order Confirmed<br>And Approved</span>
<span>Packed</span><span>Shipped</span><span>Delivered</span>
</div>
</div>
<div class="content2">
<h5>
Expected Arrival : <?php echo $exp;?><br>
Order Status : <?php echo $statusTXN;?><br>
</h5>
</div>

</div>
<p class="note">Note: Order Will be Delivered Within 7 days. You can cancel order from Profile Section.</p>
<?php } ?> 



<?php
}else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}
?>
<div class="back-btn"><a href="../index.php" class="redirect" ><i class="fa fa-spinner fa-pulse  fa-fw"></i>&nbsp;Back to Home Page</a></div>

</div><!--main -container end-->

<script>
function myFunction(){
window.print();
}
</script>
</body>
</html>