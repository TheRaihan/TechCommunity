<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>All Profile</title>
    <style>
        .image{
            border-radius: 8px;
            box-shadow: 3px 3px 6px lightgrey;
        }
    </style>
</head>
<body>
   
<div class="container" align="center">
    <h1>
    <br>
    <br>
    Hi <?php echo $_SESSION['name'];?>
    </h1>
    <?php echo $_SESSION['email'];?>
    <?php 
    
        $query="SELECT image FROM user WHERE email='{$_SESSION['email']}'";
        $result=mysqli_query($con,$query);
        while ($row = mysqli_fetch_array($result))
        {
        $image=$row["image"];
        }
    ?>
    <br>
    <br>
     <img class="image" src="profiles/<?php echo $image ?>"width="200px" height="200px">


</div>
   
    <!--bootstrap js-->
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>   
</body>
</html>