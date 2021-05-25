<?php
session_start();
include("../db.php"); //data connection
include("admin_main_navbar.php");
$id =$_GET['id'];
$query="SELECT * FROM blogs where id='$id'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num>0)
{
    while($row=mysqli_fetch_array($result))
    {
    $id=$row["id"];
    $g_name=$row["name"];
    $type=$row["type"];
    $category=$row["category"];
    $title=$row["title"];
    $description=$row["description"];
    $blog_image=$row['blog_image'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/nav.css">

        <title>Document</title>
        <style>
            .back{
                background-color: whitesmoke;
                }
            .data{
                white-space: pre-wrap;
                font-family:Arial, Helvetica, sans-serif;
                padding: 40px;
                box-shadow: 3px 3px 6px lightgrey;
                background-color: white;
                }
            .image{
                border-radius: 5px;
                box-shadow: 3px 3px 6px lightgrey;
            }
            .c_data{
                font-family:Arial, Helvetica, sans-serif;
                padding: 10px;
                background-color: white;
            }
            .des{
                white-space: pre-wrap;
            }
        </style>

    </head>
    <body class="back">
        <br>
        <br>
        <div class="container" align="center">  
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
            <h1><?php echo $title;?></h1>
            <img class="image" src="../images/<?php echo $blog_image;?>"width="700px" height="400px">
            <br>
            <br>
            <p><?php 
             if(!isset($_SESSION['pass']))
             {
                 $name="ADMIN";
                 echo "by ".$g_name;

             }
             else{
                 echo "by ".$g_name;
             }
            ?></p>
            <p style="color: blue"><?php echo $type;?>&nbsp&nbsp<?php echo $category;?></p>
            <p class="data" style="text-align:justify"><?php echo $description;?></p>
            <form action="likes.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <?php
                $query1="SELECT * FROM likes WHERE blog_id='$id'";
                $result1=mysqli_query($con,$query1);
                $count_likes=mysqli_num_rows($result1);
                ?>
                <input type="submit" name="like" value="like <?php echo "(".$count_likes.")";?>"style="background:none; color: #337ab7; border: none">    
            </form>
            <form action="dislikes.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <?php
                $query2="SELECT * FROM dislikes WHERE blog_id='$id'";
                $result2=mysqli_query($con,$query2);
                $count_dislikes=mysqli_num_rows($result2);
                ?>
                <input type="submit" name="dislike" value="dislike <?php echo "(".$count_dislikes.")";?>"style="background:none; color: #337ab7; border: none">    
            </form>
            <br>
            <?php
            if($_SESSION["name"]==$g_name)
            {
             ?>
              <a class="btn btn-secondary" href=admin_editpost.php?id=<?php echo $id;?>&g_name=<?php echo $g_name;?>>Edit the post</a>
            <?php
            }
            ?>
                <a class="btn btn-secondary" href=admin_dashboard.php>Back To ADMIN Dashboard</a>
            <br>
            <br>
            </div>
            <div class="col-sm-2"></div>
        </div>  
        </div>
        
        
        <form method="POST" action="admin_comments.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="container" align="center">
            <br>
            <textarea name="comment" rows="5" cols="100" placeholder="Add a comment" required></textarea>
            <br>
            <button style="position:absolute;margin-left: 330px"type="submit" name="add" class="btn btn-secondary">ADD</button>
            </div>
            </form>
            <br>
            <br>
            <div class="container">
                <h1>THE COMMENTS</h1>
            <?php
                $c_query="SELECT * FROM comments WHERE blog_id='$id'";
                $c_result=mysqli_query($con,$c_query);
            while($c_row=mysqli_fetch_array($c_result))
            {
                $c_id=$c_row["id"];
                $c_name=$c_row["name"];
                $comment=$c_row["comment"];
            ?>
            <div  style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
             <div class="c_data" >
                <b class="des"><?php echo "$comment";?></b>
                <br>
                <br>
                <p style="color:#337ab7"><?php echo "By   ".$c_name;?></p>
                <?php
                if($_SESSION['pass']=="admin123")
                {
                ?>
                <br>
                    <a align="left"class="btn btn-danger" href=delete_comment.php?id=<?php echo $id;?>&c_id=<?php echo $c_id;?>>Delete COMMENT</a>
                  <br>
                <?php
                 }
                ?>
            </div>
            <hr style="width:100%">
            </div>
            </body>
            </html>
            <?php
            }
            ?>
            </div>
          


</body>
        </html>
<?php
    }
}
include("../footer.php");
?>
