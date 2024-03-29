<?php
session_start(); // session starts
include("../db.php");// database connection
include("admin_main_navbar.php");
if(!$_SESSION['name'])
{
    echo "<script type='text/javascript'>alert('You are not Logged in!!'); window.location.href='../adminlogin.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/nav.css">
    <style>
        .back{
                background-color: whitesmoke;
                }
        .image{
            border-radius: 8px;
            
        }
        .data{
            box-shadow: 3px 3px 6px lightgrey;
            padding: 15px;
            background-color: white;
        }
        .des{
            white-space: pre-wrap;
            text-align:justify;
        }
        .btn{
            box-shadow: 2px 2px 2px lightgray;
        }
    </style>
    <title>Dashboard</title>
</head>
    <body class="back">
   
        <div class="container" align="center">
            <h1>
            <br>
            Hi <?php echo $_SESSION['name'];?>
            </h1>
            <p>ADMIN</p>
        </div>

    <?php
    $query="SELECT * from blogs";
    $result=mysqli_query($con,$query);
    while ($row = mysqli_fetch_array($result))
    {   $id=$row["id"];
        $name=$row["name"];
        $type=$row["type"];
        $category=$row["category"];
        $title=$row["title"];
        $description=$row["description"];
        $blog_image=$row['blog_image'];
    ?>

    <br>
    <br>
    <div class="container">
     <div class="row" >
        <div class="col-sm-4">  
            <img class="image"src="../images/<?php echo $blog_image;?>"width="400px" height="260px">
            <br>
            <br>
          <div align="center" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
          <?php
                $query1="SELECT * FROM likes WHERE blog_id='$id'";
                $result1=mysqli_query($con,$query1);
                $count_likes=mysqli_num_rows($result1);
                echo "Likes(".$count_likes.")  ";
                ?>
                <?php
                $query2="SELECT * FROM dislikes WHERE blog_id='$id'";
                $result2=mysqli_query($con,$query2);
                $count_dislikes=mysqli_num_rows($result2);
                echo " Dislikes(".$count_dislikes.")";
                ?>
         </div>
        </div>
        <div class="col-sm-8">
            <div class="data" >
                <h3><?php echo $title;?></h3>
                <p><?php echo "by ".$name;?></p>
                <p  style="color: blue"><?php echo $type;?>&nbsp&nbsp&nbsp<?php echo $category;?></p>
                <p class="des"><?php echo substr("$description",0,500).".....";?></p>
                
                <a class="btn btn-secondary" href=admin_fullpost.php?id=<?php echo $id;?>>View Full Post</a>
                <a class="btn btn-danger" href=delete_post.php?id=<?php echo $id;?>>Delete POST</a>
                <br>
            </div>
            <br>
        </div>
        <hr style="width:100%">
    </div>
</div>
<?php
}
include("../footer.php");
?>
</body>
</html>
