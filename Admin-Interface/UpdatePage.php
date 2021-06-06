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
				<li><a href="../adminhome.php">Home</a></li>
				<li><a href="../admincamps.php">Camp</a></li>
				<li><a href="../admincampenrollment.php">CampEnrollments</a></li>
				<li><a href="../adminbook/adminbooks.php">Books</a></li>
				<li><a href="../bookorders/bookorders.php">Books Orders </a></li>
				<li><a href="../orderstatus/orderstatus.php">Order Status </a></li>
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
		
<!------------------------------------------------------------------------------------------->
<div class="container">
<div class="text-center">
        <h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px;color:white; ">Update a Product</h2>
    </div><hr color="white">
	
	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=yoga;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	if(isset($_POST["edit_btn"]))
	{
		$id=$_POST["edit_id"];	
	    
	}
	?>
	  
   
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	
	$stmt= $db->query("select * from product where id=$id");
	while($row=$stmt->fetch()){	
?>

<form action="template/BookupdateQuery.php" method="post">
<div class="form-row" >
  <div class="form-group col-md-2">
      <label>Product Id</label>
      <input type="text" class="form-control" value="<?php echo $row['id']." " ?>" name="id" readonly />
    </div>
    <div class="form-group col-md-6">
      <label >Title</label>
      <input type="text" class="form-control" value="<?php echo $row['title']." " ?>" name="title" required />
    </div>
    <div class="form-group col-md-4">
      <label >Price</label>
      <input type="number" class="form-control" value="<?php echo $row['price'] ?>" name="price" min="0" required />
    </div>

  </div>
   <div class="form-group">
    <label >Description</label>
    <textarea class="form-control"  rows="3"  name="description" required /><?php echo $row['description'] ?></textarea>
  </div>
<div class="form-group col-md-4">
      <label >Display</label>
     <select class="form-control" name="Display" value="<?php echo $row['Display'] ?>" required />
  <option name="Display" style="color:black;">No</option>
  <option name="Display" style="color:black;">Yes</option>
  </select>
    </div>
    
<button type="submit" name="submit" value="submit" class="btn btn-primary"/>Update</button>&nbsp;
<a href="books.php " class="button" style="color:white;">Cancel</a>
  </form>
  
  <?php
	}
?>


	
	</div>
	</body>
</html>	