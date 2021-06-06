<!DCTYPE html>
<html>
<head>
<title>cart Page</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/stylefooter.css">
<link rel="stylesheet" type="text/css" href="../css/stylecart.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



</head>
<body>


<!---------navigation-------->

<section id="nav-bar">

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="#"><img src="../pic/logo1.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
      
	   <li class="nav-item ">
        <a class="nav-link" href="index.php">BOOKS</a>
      </li>
	<li class="nav-item active">
        <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i>&nbsp;CART</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="AboutUs.html">ABOUT US</a>
      </li>
	   <li class="nav-item">
        <a class="nav-link" href="Contact.html">CONTACT</a>
      </li>
      
 <li class="nav-item ">
        <a class="nav-link" href="profile.php"><i class="fa fa-user"></i>&nbsp;Profile</a>
      </li>
    </ul>
  </div>
</nav>
</section>
<!---------------------------------------------------------------------------->
<!---------book section-------->
<?php   session_start();
 if(isset($_SESSION['CustId'])==false)
 { ?><div class="text-center">
   <h1 ><a href="login/login.php" style="color:red;"><?php echo "Please Login First"; ?></a></h1></div><?php
 }
 else{
unset($_SESSION['cartCount']);
?>

<div class="container">
    <div class="text-center">
        <h2 style="margin-top: 0px; padding-top: 10px; padding-left: 5px; "><b>Update your cart</b></h2>
    </div>
	
<table class="table table-hover ">
 <tr>             
         
  <td class="col-sm-6 col-md-6">
  <b> Product </b>                
    </td>
	<td><b>Seats</b></td>
	<td><b>Price</b></td>
	<td colspan="2"><b>Total</b></td>
	<td>
	<form action="removeCartQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $_SESSION['CustId']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-outline-danger" name="removeAll_btn">Clear All</button></form></td>
</tr>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	$cid=$_SESSION['CustId'];
	$subTotal   = 0;
	$quan   = 0;
    $tax        = 10;
	$stmt= $db->query("select product.id,product.title AS Title ,product.price AS price,product.description AS description,
	product.image AS image, product.price*cart.Quantity AS totalAmount,
	cart.id AS id ,cart.Quantity AS Quantity
	FROM cart LEFT JOIN product ON cart.Pid=product.id WHERE cart.Cid=$cid");
	while($row=$stmt->fetch()){	
		$subTotal += $row['totalAmount'];
		$quan += $row['Quantity'];
?>
<tr>
  <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img src="../pic/book/<?php echo $row['image']." " ?>" alt="" style="width:72px; height: 72px;"></a>
                            <div style="padding-left: 10px;" class="media-body">
                                <h4 class="media-heading"><a href="#"><?php echo $row['Title']." " ?></a></h4>
                                <p><?php echo  substr( $row['description'], 0, 60) . '...'; ?></p>
                            </div>
                        </div>
    </td>
<td><P><?php echo $row['Quantity']?>Pies</p></td>
	<td><?php echo $row['price']." " ?></td>
	<td colspan="2"><?php echo $row['totalAmount'] ?></td>
	<td>
	<form action="removeCartQuery.php" method="post">
        <input type="hidden" name="remove_cid" value="<?php echo $_SESSION['CustId']; ?>" style="color:black"/>
	<input type="hidden" name="remove_id" value="<?php echo $row['id']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn">Remove</button>	</form></td>
</tr>
		<?php } ?>
<tr style="text-align:right;"><td colspan="6"><h5 style="color:red;padding-top:5px;">SUBTOTAL :&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><B><?php echo number_format( $subTotal, 2 ); ?></B></h5>
</td></tr>
<tr style="text-align:right;"><td colspan="6"><h5 style="color:red;padding-top:5px;">TAXES :&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><B><?php echo number_format( $tax * $quan, 2 ); ?></B></h5>
</td></tr>
<tr style="text-align:right;"><td colspan="6"><h5 style="color:red;padding-top:5px;">TOTAL :&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><B><?php echo number_format( $subTotal+($tax * $quan), 2 ); ?></B></h5>
</td></tr>              
<tr style="text-align:right;"><td colspan="6">
<p>

  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Place Order
  </button>
</p>
<div class="collapse" id="collapseExample">
<div class="card card-body">
<h2 style="color:red;text-align:left;">Shipping Details:</h3>
<!-- Form start -->
<form method="post" action="payment/index.php" style="margin-left:10%;margin-right:10%;"> 
 <h4 style="text-align:left;">Name:</h4>
  <div class="form-row" >
 
    <div class="form-group col-md-6">
      <input type="text" class="form-control" name="fname" pattern="[A-Z]{0,15}[a-z]{0,15}"  placeholder="First Name" required />
    </div>
    <div class="form-group col-md-6">
      <input type="Text" class="form-control" name="lname" pattern="[A-Z]{0,15}[a-z]{0,15}" placeholder="Last Name" required />
    </div>
    
  </div>
<h4 style="text-align:left;">Residental Address:</h4>
  <div class="form-row" >
 
    <div class="form-group col-md-12">
      <input type="text" class="form-control" name="add1" required />
   <h6 style="text-align:left;">&nbsp;&nbsp;Flat No/Bld Name</h6>
    </div>
    <div class="form-group col-md-12">
      <input type="Text" class="form-control" name="add2" required />
 <h6 style="text-align:left;">&nbsp;&nbsp;Street/Road/location</h6>
    </div>
   <div class="form-group col-md-4">
      <input type="Text" class="form-control" name="city" pattern="[A-Z]{0,15}[a-z]{0,15}" title="city should contain 2-15letter"required />
 <h6 style="text-align:left;">&nbsp;&nbsp;city</h6>
    </div>
   <div class="form-group col-md-4">
      <input type="Text" class="form-control" name="state" pattern="[A-Z]{0,15}[a-z]{0,15}" title="state should contain 2-15letter" required />
 <h6 style="text-align:left;">&nbsp;&nbsp;state</h6>
    </div>

<div class="form-group col-md-4">
      <input type="number" class="form-control" name="Zipcode" pattern="[0-9]{6}" min="100000" max="999999" required />
 <h6 style="text-align:left;">&nbsp;&nbsp;Zip code</h6>
    </div>
   <div class="form-group col-md-6">
      <input type="Text" class="form-control" name="country" pattern="[A-Z]{0,15}[a-z]{0,15}" title="country should contain 2-15letter" required  />
 <h6 style="text-align:left;">&nbsp;&nbsp;country</h6>
    </div>  
   
  </div>
<h4 style="text-align:left;">Contact Details:</h4>
  <div class="form-row" >

<div class="form-group col-md-6">
      <input type="tel" class="form-control" name="nummobile" pattern="[0-9]{10}" required />
 <h6 style="text-align:left;">&nbsp;&nbsp;Mobile No</h6>
    </div> 
 <div class="form-group col-md-6">
      <input type="email" class="form-control" name="Email" />
 <h6 style="text-align:left;">&nbsp;&nbsp;Email(Optional)</h6>
    </div>
</div>
 <div style="display:none;">
<input title="TXN_AMOUNT"  tabindex="10" type="hidden" name="TXN_AMOUNT" value="<?php echo $subTotal+($tax * $quan) ?>">
<input id="ORDER_ID"  tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" 
value="<?php echo  "ORDS" . rand(10000,99999999)?>">
</div>
<h4 style="text-align:left;color:red;padding-top:5px;">TOTAL:&nbsp;<i class="fa fa-inr" aria-hidden="true"></i><B><?php echo number_format( $subTotal+($tax * $quan), 2 ); ?></B></h4>
           
 
 <button type="submit" name="submit" value="submit" class="btn btn-outline-success"/>Save Details</button>&nbsp;<button type="reset" class="btn btn-primary" value="clear" >Reset</button>
</form><br>
<!-- Form End -->
</div></div>	
</tr>
</table>
 <?php  } ?>
</div>
<!------------------------------------------------>
<!----------------------------------footer------------------------------------------->


<div class="footer">
<div class="col-md-12"> <img src="../pic/logo1.png" class="logo1"><a href="#nav-bar"><i class="fa fa-angle-double-up fa-4x linkup linkk" ></i></a></div>
<div class="row" style="width:100%;padding-left:60px;padding-top:30px;padding-bottom:20px;">

<div class="col-md-4"><b><h5><i class="fa fa-paper-plane-o" ></i>&nbsp;Contact Info :</h5></b>
Mobile: +91 7678065764<br>
Email: yogaeducation45@gmail.com<br>
<b>FOR ANY ASSISTANCE</b><br><i class="fa fa-phone"></i>&nbsp;022-6109-4444
<br><br>
</div>
<div class="col-md-4"><h5><b><i class="fa fa-clock-o" ></i>&nbsp;Office Hours :</h5></b>

7.30Am to 7.00Pm (Mon To Sat)<br>
             7.30Am to 5.00Pm (Sunday)<br>
           Center hours as per Class schedule<br>
<br>
</div>
<div class="col-md-4"><b><h5>Social Media</h5></b>
<a href="https://www.facebook.com/profile.php?id=100006130181720" target="_blank" class="linkk" style="font-size:18px;">
<i style="padding-bottom:8px;" class="fa fa-facebook-official linkk" >&nbsp; Facebook</i></a><br>
<a href="https://twitter.com/Abhishe66218733" target="_blank" class="linkk" style="font-size:18px;">
<i style="padding-bottom:8px;"class="fa fa-twitter linkk" >&nbsp; Twitter</i></a><br> 
<a href="https://www.instagram.com/ab_sawant/" target="_blank" class="linkk" style="font-size:18px;">
<i style="padding-bottom:8px;"class="fa fa-instagram linkk"> &nbsp;Instagram</i></a><br>
<a href="https://www.youtube.com/user/beyounick" target="_blank" class="linkk" style="font-size:18px;">
<i style="padding-bottom:8px;"class="fa fa-youtube-play linkk"> &nbsp;YouTube</i></a>
</div>
</div>
<div class="end">
<hr color="white"><p>Copyright <i class="fa fa-at" aria-hidden="true"></i> 2018.YogaEducation All rights reserved</p></div>

</div>


</body>
</html>