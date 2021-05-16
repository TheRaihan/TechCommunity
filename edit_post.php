<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
if($_SESSION['name']==$_GET['g_name'])
{
    $id=$_GET['id'];
    $name=$_GET['g_name'];
    $query="SELECT * FROM blogs where id='$id' AND name='$name'";
    $result=mysqli_query($con,$query);
    $num=mysqli_num_rows($result);
    if($num>0)
  {
    while($row=mysqli_fetch_array($result))
      {
      $id=$row["id"];
      $name=$row["name"];
      $type=$row["type"];
      $category=$row["category"];
      $title=$row["title"];
      $description=$row["description"];
      $blog_image=$row['blog_image'];
  ?>
  <!DOCTYPE html>
  <html>
  <head>
  <title>POST</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <form method="POST" action="edit_postdata.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value=<?php echo $id;?>>
    <div class="container">
      <br>
    <label for="type"><h4>What type of blog is this?</h4></label>
    <select id="type" name="type" required>
    <option selected="selected" value="<?php echo $type;?>" hidden><?php echo $type;?></option>
      <option value="news">News</option>
      <option value="reviews">Reviews</option>
      <option value="rumors">Rumors</option>
      <option value="others">Others</option>
    </select>
    <br>
    <br>
    <label for="category"><h4>What is this blog related to?</h4></label>
    <select id="category" name="category" required>
    <option selected="selected" value="<?php echo $category;?>" hidden><?php echo $category;?></option>
      <option value="phones">Phones</option>
      <option value="pc">PC</option>
      <option value="gadgets">Gadgets</option>
      <option value="others">Others</option>
    </select>
    <br>
    <br>
      <input type="text" name="title" placeholder="Title for your blog" value="<?php echo $title;?>" required/>
      <br>
      <br>
    <textarea name="description" rows="20" cols="100" placeholder="Description" required><?php echo $description;?></textarea>
    <br>
    <br>
   <label for="blog_image"><h4>Image for your Blog(optional): </h4></label>
        <input type="file" name="blog_image">
      <div>
        <button type="submit" name="editpost" class="btn btn-secondary">UPDATE</button>
        <a class="btn btn-secondary" href=dashboard.php>Back To Dashboard</a>
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
<?php
    }
  }
}
echo "<script type='text/javascript'>alert('You didn't post it!!'); window.location.href='dashboard.php'</script>";

?>