<html>
	<head>
			<title>Admin panel</title>


		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/styleAdmin.css" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	</head>
	<body>
		<div id="menu-bar">
			<div id="menu" onclick="onClickMenu()">
				<div id="bar1" class="bar"></div>
				<div id="bar2" class="bar"></div>
				<div id="bar3" class="bar"></div>
			</div>
			<ul class="nav" id="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="bookorders.php">Books Orders </a></li>
				<li><a href="orderstatus.php">Order Status </a></li>
				
			</ul>
		</div>
		<div class="menu-bg" id="menu-bg"></div>
		<script>
 		function onClickMenu(){
		document.getElementById("menu").classList.toggle("change");
		document.getElementById("nav").classList.toggle("change");
	
		document.getElementById("menu-bg").classList.toggle("change-bg");
}
		</script>
		<div class="">
		<h1 class="hed">Admin Panel<img src="../pic/logo1.png" class="log"><h1></div>
		<hr>
<?php session_start(); 
 if(isset($_SESSION['name'])==false)
 { ?><div class="text-center">
  <h1><a href="../login/login.php" style="color:red;">Please Login First</a></h1></div><?php
 }
 else{
?>
<h4><a href="template/logout.php" style="float:right;padding-right:50px;">Logout</h4></a>
<!----------------------------------------------------------------->
	
<div class="container">
    <div class="text-center">
        <h2 style="color:white; ">Book Orders</h2>
    </div>
    <br>
<table class="table table-hover">

<tr><td>Cid</td> <td>Name</td><td>OrderId</td> <td>OrderStatus</td><td>Document</td><td>Remove</td></tr>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	
	$stmt= $db->query("select * from transcationbook where txnStatus='TXN_SUCCESS' AND OrderStatus!='Order Cancelled' ");
	while($row=$stmt->fetch()){	
?>
<tr> <td ><?php echo $row['Cid']." " ?></td> <td><?php echo $row['name']." " ?></td><td><?php echo $row['OrderID']." " ?></td>
<td><?php echo $row['OrderStatus']." " ?></td>	
<td> 
	<form action="Invoice.php" method="post">
	<input type="hidden" name="preview_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-primary" name="remove_btn">View Detail</button></form></td>
	<td> 

<?php 
$compare=$row['OrderStatus'];
if($compare=='Delivered'){?>
	<form action="template/removeOrderQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn"><i class="fa fa-trash" ></i></button></form>
       <?php } else { ?>
<button type="submit" class="btn btn-danger" disabled><i class="fa fa-trash" title="Order is still not deliverd" ></i></button>
 <?php }?>
	</td>
	</tr>
<?php } ?>
</table>
<!--------------------------------------------------------------------------------------------------------->

<div class="container">
    <div class="text-center">
        <h2 style="color:white; ">Cancelled Book Orders</h2>
    </div>
    <br>
<table class="table table-hover">

<tr><td>Cid</td> <td>Name</td><td>OrderId</td> <td>OrderStatus</td><td>Document</td><td>Remove</td></tr>
<?php
	
	
	
	$stmt= $db->query("select * from transcationbook where txnStatus='TXN_SUCCESS' AND OrderStatus='Order Cancelled'");
	while($row=$stmt->fetch()){	
?>
<tr> <td ><?php echo $row['Cid']." " ?></td> <td><?php echo $row['name']." " ?></td><td><?php echo $row['OrderID']." " ?></td>
<td><?php echo $row['OrderStatus']." " ?></td>	
<td> 
	<form action="Invoice.php" method="post">
	<input type="hidden" name="preview_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-primary" name="remove_btn">View Detail</button></form></td>
	<td> 
	<form action="template/removeOrderQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn"><i class="fa fa-trash" ></i></button></form></td>
	
        </tr>
<?php } ?>
</table>

<!--------------------------------------------------------------------------------------------------------->

<div class="container">
    <div class="text-center">
        <h2 style="color:white; ">Delivered Book Orders</h2>
    </div>
    <br>
<table class="table table-hover">

<tr><td>Cid</td> <td>Name</td><td>OrderId</td> <td>OrderStatus</td><td>Document</td><td>Remove</td></tr>
<?php
	
	
	
	$stmt= $db->query("select * from transcationbook where txnStatus='TXN_SUCCESS' AND OrderStatus!='Order Cancelled' AND OrderStatus='Delivered'");
	while($row=$stmt->fetch()){	
?>
<tr> <td ><?php echo $row['Cid']." " ?></td> <td><?php echo $row['name']." " ?></td><td><?php echo $row['OrderID']." " ?></td>
<td><?php echo $row['OrderStatus']." " ?></td>	
<td> 
	<form action="Invoice.php" method="post">
	<input type="hidden" name="preview_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-primary" name="remove_btn">View Detail</button></form></td>
	<td> 
	<form action="template/removeOrderQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn"><i class="fa fa-trash" ></i></button></form></td>
	
        </tr>
<?php } ?>
</table>

<!--------------------------------------------------------------------------------------------------------->

<div class="container">
    <div class="text-center">
        <h2 style="color:white; ">Fail Trascations </h2>
    </div>
    <br>
<table class="table table-hover">

<tr><td>Cid</td> <td>Name</td><td>OrderId</td> <td>OrderStatus</td><td>Document</td><td>Remove</td></tr>
<?php
	
	
	
	$stmt= $db->query("select * from transcationbook where txnStatus='TXN_FAILURE' ");
	while($row=$stmt->fetch()){	
?>
<tr> <td ><?php echo $row['Cid']." " ?></td> <td><?php echo $row['name']." " ?></td><td><?php echo $row['OrderID']." " ?></td>
<td><?php echo $row['OrderStatus']." " ?></td>	
<td> 
	<form action="Invoice.php" method="post">
	<input type="hidden" name="preview_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-primary" name="remove_btn">View Detail</button></form></td>
	<td> 
	<form action="template/removeOrderQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['OrderID']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn"><i class="fa fa-trash" ></i></button></form></td>
	
        </tr>
<?php } ?>
</table>
<br>

</div><?php } ?>
	</body>
</html>