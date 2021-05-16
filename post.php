<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>POST</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <form method="POST" action="post_data.php" enctype="multipart/form-data">
  	<div class="container">
    <br>
  
  <label for="type"><h4>What type of blog is this?</h4></label>
  <select id="type" name="type"required>
  <option selected disabled hidden>Choose an Option</option>
    <option value="news">News</option>
    <option value="reviews">Reviews</option>
    <option value="rumors">Rumors</option>
    <option value="others">Others</option>
  </select>
  <br>
  <br>
  <label for="category"><h4>What is this blog related to?</h4></label>
  <select id="category" name="category" required>
  <option selected disabled hidden>Choose an Option</option>
    <option value="phones">Phones</option>
    <option value="pc">PC</option>
    <option value="gadgets">Gadgets</option>
    <option value="others">Others</option>
  </select>
  <br>
  <br>
    <input type="text" name="title" placeholder="Title for your blog" required/>
    <br>
    <br>
  <textarea name="description" rows="20" cols="100" placeholder="Description" required></textarea>
  <br>
  <br>
  
  <div>
  <h4>Image for your Blog: </h4>
  <label> <h6>Choose image of your choice:</h6></label>
    <input type="file" name="blog_image">
    <br>
    <br>
    <button type="submit" name="post" class="btn btn-secondary">POST</button>
    <br>
   <br>
		</div>
  </form>
</div>

<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
</body>
</html>