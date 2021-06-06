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
		<hr color="white">
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
        <h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px;color:white; ">Update your Book</h2>
    </div>
    <br>
	
	<!----------------------------------------------------------------------------->
	   
   <table class="table table-hover">

<tr> <td >Id</td> <td>Title</td> <td >Price</td> <td colspan="2">Description</td>  <td> CreateOn</td><td>Display</td>
<td>Update</td><td>Remove</td></tr>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	
	$stmt= $db->query("select * from product");
	while($row=$stmt->fetch()){	
?>
<tr> <td><?php echo $row['id']." " ?></td>
	<td><?php echo $row['title']." " ?></td>
	<td><?php echo $row['price']." " ?></td>
	<td colspan="2"><?php echo  substr( $row['description'], 0, 60) . '...'; ?></td>
	<td><?php echo $row['createOn']." " ?></td>
	<td><?php echo $row['display']." " ?></td>
	<td> 
	<form action="UpdatePage.php" method="post">
	<input type="hidden" name=" edit_id" value="<?php echo $row['id']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-success" name="edit_btn">Edit</button>	</form></td>
	<td> 
	<form action="template/BookremoveQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['id']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn">Remove</button>	</form></td>
	
	</tr>
<?php
	}
?>

</table><br><br>
	<!----------------------------------------------------------------------------->
	 
<div class="text-center">
        <h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px;color:white; ">Add a Product</h2>
    </div><hr color="white">

	 <form action="template/BookinsertQuery.php" method="POST" enctype="multipart/form-data"> 
 
  <div class="form-row" >
 
    <div class="form-group col-md-8">
      <label >Title</label>
      <input type="text" class="form-control" name="title" required />
    </div>
    <div class="form-group col-md-4">
      <label >Price</label>
      <input type="number" class="form-control" name="price" min="0" required />
    </div>
    
  </div>
    <div class="form-group">
    <label >Description</label>
    <textarea class="form-control"  rows="3" name="description" required /> </textarea>
  </div>
  <div class="form-row" >
  <div class="form-group col-md-4">
    <label >Image</label>
 <p>upload Photo:&nbsp;&nbsp;<input type="file" name="photo" value="" required />

</div>
</div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" required />
      <label class="form-check-label" for="gridCheck">
        Conform
      </label>
    </div>
  </div>
  <button type="submit" name="submit" value="submit" class="btn btn-primary"/>Add</button>&nbsp;<button type="reset" class="btn btn-primary" value="clear" >Reset</button>
</form>

<?php } ?></body>
</html>