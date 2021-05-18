<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
if(isset($_POST['post'])&& isset($_POST['category']))
{
$c=$_POST['category'];

$query="SELECT * from blogs WHERE category='$c'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num>0)
{
while ($row = mysqli_fetch_array($result))
{   $id=$row["id"];
    $name=$row["name"];
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
        <title><?php echo $_POST['category'];?></title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/nav.css">

    </head>
    <body class="back">
        <div align="center">
                <br>
                    <h1><?php echo $_POST['category'];?></h1>
                </div>
            <br>
            <br>
            <div class="container">
            <div class="row" >
                <div class="col-sm-4">  
                    <img class="image"src="images/<?php echo $blog_image;?>"width="400px" height="260px">
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
                        <p>
                            <?php
                            echo "by ".$name;
                            ?>
                        </p>
                        <p style="color:blue" ><?php echo $category;?>&nbsp&nbsp&nbsp<?php echo $type;?></p>
                        <p class="des"><?php echo substr("$description",0,500).".....";?></p>
                        
                        <a class="btn btn-secondary" href=full_post.php?id=<?php echo $id;?>>View Full Post</a>
                        <br>
                    </div>
                    <br>
                </div>
                <hr style="width:100%">
            </div>
        </div>
        <div align="center">

            <a  class="btn btn-light"  href=dashboard.php>Back To Dashboard</a>
        </div>
        <br>

        <?php
        include("footer.php");
        ?>
        
    </body>
</html>
<?php
        }
    }
}
else{
    echo "<script type='text/javacript'>alert('You didn't select anything!'); window.location.href='dashboard.php'</script>";
}
?>

