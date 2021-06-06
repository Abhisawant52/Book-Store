<html>
	<head>
<title>Admin Panel</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/styleAdmin.css" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
 		function onClickMenu(){
		document.getElementById("menu").classList.toggle("change");
		document.getElementById("nav").classList.toggle("change");
	
		document.getElementById("menu-bg").classList.toggle("change-bg");
}
		</script>
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
		
		<div class="">
		<h1 class="hed">Admin Panel<img src="../pic/logo1.png" class="log"><h1></div>
		<hr>
<script type="text/javascript">
        document.write("<center><h1><font size=+8 style='color: white;'>");
        var day = new Date();
        var hr = day.getHours();
        if (hr >=5 && hr < 12) {
            document.write("Good Morning!<br>Admin");
        } else if (hr == 12) {
            document.write("Good Noon!<br>Admin");
        } else if (hr >= 12 && hr <= 17) {
            document.write("Good Afternoon!<br>Admin");
        } else {
            document.write("Good Evening!<br>Admin");
        }
 
        document.write("</font></h1></center>");
    </script>
<div  style="font-size:20px ;">
<center>

<?php session_start(); 
 if(isset($_SESSION['name'])== false)
 { ?><div class="text-center">
  <h1><a href="Template/login.php" style="color:red;">Please Login First</a></h1></div><?php
 }
 else{
	echo strtoupper($_SESSION['name']); ?>
</center><br>
<div class="container">
<table class="table table-hover">
<a href="template/register.php">Add New Admin</a>
<a href="template/logout.php" style="float:right;">Logout</a>
<tr><td>Name</td> <td>Email</td><td>CreteOn</td><td>Remove</td></tr>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	$stmt= $db->query("select * from admin");
	while($row=$stmt->fetch()){	
?>
<tr> <td ><?php echo $row['name']." " ?></td> <td><?php echo $row['email']." " ?></td><td><?php echo $row['createOn']." " ?></td>
<td>
<?php
$compare=$row['main'];
if($compare=='0'){?>
	<form action="template/removeQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['email'];?>">
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn"><i class="fa fa-trash" ></i></button></form>
<?php } else { ?>
<button type="submit" class="btn btn-danger" disabled><i class="fa fa-trash" title="You cannot remove Main Admin" ></i></button>
 <?php }?>
</td>
	</tr>
<?php } ?>
</div> </div>
<?php } ?>
</body>
</html>