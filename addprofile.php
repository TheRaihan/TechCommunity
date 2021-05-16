<?php
 session_start();
 include("db.php"); //data connection
 include("navbar.php");
  $check_email=$_SESSION['email'];
  if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $target = "profiles/".basename($image);
  	$query= "UPDATE user SET image='$image' where email='$check_email'";
	  mysqli_query($con, $query);
	  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) 
    {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
	header('location: dashboard.php');
}
 // $result = mysqli_query($db, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav.css">

</head>
<body>
  <form method="POST" action="" enctype="multipart/form-data">
  	<div class="container">
	  <h1>
    <br>
    <?php echo $_SESSION['name'];?>
    </h1>
	<?php echo $_SESSION['email'];?>
	<br>
	<br>
  	  <input type="file" name="image">
		<div>
			<br>
			<button type="submit" name="upload" class="btn btn-secondary">ADD</button>
			<a href="dashboard.php" class="btn btn-secondary">Back</a>
		</div>
  </form>
</div>

<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
</body>
</html>
