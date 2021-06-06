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

<link rel="stylesheet" type="text/css" href="../css/styleInvoice.css">
</head>
<body>

<header>
<H1>Shopping details:</H1>
<img src="../pic/logo1.png" width=200px; height=70px;>
</header>

<div class="main-container shadow bg-white rounded">

<div class="main-header">
<h3><b>Enrollment details:</b></h3>
<button type="button" class="btn btn-primary"onclick="myFunction()">Print Acknowledgement</button>
</div>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	$OrderId=$_POST['preview_id'];
	$stmt= $db->query("select * from transcationbook where OrderID ='$OrderId'");
	while($row=$stmt->fetch()){	
?>
<?php
if ($row['txnStatus'] == "TXN_SUCCESS") { ?>
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
	echo $row['name'] ."<br>Address:". $row['Address']."<br>Contact Details:".$row['contactDetail'].
"<br>Price: ".$row['price'];
$exp=$row['exceptDate'];
$orderstatus=$row['OrderStatus'];
$Ddate=$row['DeliveryDate'];
?>
</div>
<div>
<h4>Payment Info:</h4>
<p><?php echo $row['PaymentInfo']; ?>
</div>
</div> <!-- Billing content -->

<?php 
$txnStatus=$row['txnStatus'];

} ?>

<?php
if($txnStatus != 'TXN_FAILURE'){ ?>
	
<div class="order-summary">
<h2><b>Order Summary:</b></h2>

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
	FROM  orderlist LEFT JOIN product ON  orderlist.Pid=product.id WHERE  orderlist.OrderID='$OrderId' ");
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
<?php if($orderstatus=='Order Confirmed'){ ?>
<i class="fa fa-thumbs-o-up fa-2x green"></i><span class="join green"></span>
<i class="fa fa-tags fa-2x i"></i><span class="join"></span>
<i class="fa fa-truck fa-2x i fa-flip-horizontal"></i><span class="join"></span>
<i class="fa fa-check-square-o fa-2x i " ></i>
<?php } elseif($orderstatus=="Packed"){ ?>
<i class="fa fa-thumbs-o-up fa-2x green"></i><span class="join green"></span>
<i class="fa fa-tags fa-2x i green"></i><span class="join green"></span>
<i class="fa fa-truck fa-2x i fa-flip-horizontal"></i><span class="join"></span>
<i class="fa fa-check-square-o fa-2x i " ></i>
<?php } elseif($orderstatus=="Shipped"){ ?>
<i class="fa fa-thumbs-o-up fa-2x green"></i><span class="join green"></span>
<i class="fa fa-tags fa-2x i green"></i><span class="join green"></span>
<i class="fa fa-truck fa-2x i fa-flip-horizontal green"></i><span class="join green"></span>
<i class="fa fa-check-square-o fa-2x i " ></i>
<?php } elseif($orderstatus=="Delivered"){ ?>
<i class="fa fa-thumbs-o-up fa-2x green"></i><span class="join green"></span>
<i class="fa fa-tags fa-2x i green"></i><span class="join green"></span>
<i class="fa fa-truck fa-2x i fa-flip-horizontal green"></i><span class="join green"></span>
<i class="fa fa-check-square-o fa-2x i green " ></i>
<?php } else{ ?>
<i class="fa fa-thumbs-o-up fa-2x"></i><span class="join"></span>
<i class="fa fa-tags fa-2x i"></i><span class="join"></span>
<i class="fa fa-truck fa-2x i fa-flip-horizontal"></i><span class="join"></span>
<i class="fa fa-check-square-o fa-2x i " ></i>
<?php } ?>
</div>
<div class="content-title">
<span>Order Confirmed<br>And Approved</span>
<span>Packed</span><span>Shipped</span><span>Delivered</span>
</div>
</div>
<div class="content2">
<h5>
Expected Arrival : <?php echo $exp;?><br>
Order Status :<?php echo $orderstatus;?><br>
<?php if($orderstatus=="Delivered"){
echo "Deliverery Date :" .$Ddate;
} 
elseif($orderstatus=="Order Cancelled"){
echo "Order Is cancelled on :<br>" .$Ddate;
} 
else { 

} ?>

</h5>
</div>

</div>
<?php } ?>

<div class="back-btn"><a onClick="goBack()" ><i class="fa fa-spinner fa-pulse  fa-fw"></i>&nbsp;Back to Home Page</a></div>

</div><!--main -container end-->

<script>
function myFunction(){
window.print();
}
function goBack(){
	window.history.back();
}

</script>
</body>
</html>