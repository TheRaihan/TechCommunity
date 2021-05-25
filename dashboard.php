<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
if(!$_SESSION['name'])
{
    echo "<script type='text/javascript'>alert('You are not Logged in!!'); window.location.href='userlogin.php'</script>";
}
else
{
    ?> 
    <html>
        <head>
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/nav.css">
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
        </head>
        <body>      
            <div class="container" >
                <br><br>
                <div class="row">
                <!--  -->
                <?php 
                    $query="SELECT image FROM user WHERE email='{$_SESSION['email']}'";
                    $result=mysqli_query($con,$query);
                    while ($row = mysqli_fetch_array($result))
                    {
                         $image=$row["image"];
                    }
                ?>
                    <div class="col-3 ml-5" >
                        <div class="card data" style="height: 500px;font-family: 'Open Sans Condensed', sans-serif; background-color: lavender;">

                            <img class="m-auto" style="height: 50%; width: 80%; display: block;"
                                src="images/<?php echo $image ?>";
                                alt="Card image">

                            <div class="m-auto" style="text-align: center;">
                                <h5  style="font-size:26px;"><?php echo $_SESSION['name'];?></h5>
                                <h6  style="font-size:18px;"><?php echo $_SESSION['email'];?></h6>
                            </div>
                            <div class="text-muted m-auto">
                                active now
                            </div>
                        </div>
                    </div>
                    
                    <!--  -->
                    <div class="col-9 data">
                    <?php
                    $query="SELECT * from blogs";
                    $result=mysqli_query($con,$query);
while ($row = mysqli_fetch_array($result))
{   
    $id=$row["id"];
    $name=$row["name"];
    $type=$row["type"];
    $category=$row["category"];
    $title=$row["title"];
    $description=$row["description"];
    $blog_image=$row['blog_image'];
    if($_SESSION['name'] == $name)
    {
?>
        <div class="row" style="margin: 10px 0">
            <div class="col-4" >  
                <img class="image"src="images/<?php echo $blog_image;?>"width="400px" height="260px">
            </div>
            <div class="col-8">
                        <div align="right" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">

                            <div >
                                <h3><?php echo $title;?></h3>
                                <a class="btn btn-secondary" href=full_post.php?id=<?php echo $id;?>>View Full Post</a>
                            </div>
                        
                        </div>
            </div>
        </div>
    <?php } }?>
                    <!--  -->

                </div>
                </div>
                <div class="container row" style="margin-top:10%">
                        <div class="col-6">
                            <form id="category" method="POST" action="categories.php">
                                <select class="form-select form-select-sm col-8"  id="category" name="category"  required>
                                    <option selected disabled hidden>Select Category</option>
                                    <option value="Phones">Phones</option>
                                    <option value="Pc">PC</option>
                                    <option value="Gadgets">Gadgets</option>
                                    <option value="Others">Others</option>
                                </select>

                                        <button align="center" type="submit" class="btn btn-outline-dark" style="margin:1% 90%;font-size:12px;" name="post" >Submit</button>

                            </form>
                        </div>

                        <div class="col-6">
                            <form id="sort" method="POST" action="sort.php">

                                <select class="form-select form-select-sm" id="category" name="cat"  required>
                                    <option selected disabled hidden>Sort by</option>
                                    <option value="likes" >Likes</option>
                                    <option value="dislikes">Dislikes</option>
                                    <option value="comments">Comments</option>
                                </select>
                                        <button type="submit" class="btn btn-outline-dark" style="margin:1% 90%;font-size:12px;" name="sort" >Sort</button>
                            </form>
                        </div>

            </div>
            </div>

<?php

$query="SELECT * from blogs";
$result=mysqli_query($con,$query);
?>
<div class="container">
 <div class="row" >
 <?php
while ($row = mysqli_fetch_array($result))
{   
    $id=$row["id"];
    $name=$row["name"];
    $type=$row["type"];
    $category=$row["category"];
    $title=$row["title"];
    $description=$row["description"];
    $blog_image=$row['blog_image'];
    if($_SESSION['name'] != $name)
    {
?>

        <div class="col-sm-4 data" >  
            <img class="image"src="images/<?php echo $blog_image;?>"width="400px" height="260px">
            
                 <div align="center" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                    <?php
                    
                    $query1="SELECT * FROM likes WHERE blog_id='$id'";
                    $result1=mysqli_query($con,$query1);
                    $count_likes=mysqli_num_rows($result1);
                    echo "Likes(".$count_likes.")  ";

                    $query2="SELECT * FROM dislikes WHERE blog_id='$id'";
                    $result2=mysqli_query($con,$query2);
                    $count_dislikes=mysqli_num_rows($result2);
                    echo " Dislikes(".$count_dislikes.")  ";
                    $queryc="SELECT * FROM comments WHERE blog_id='$id'";
                    $resultc=mysqli_query($con,$queryc);
                    $count_comments=mysqli_num_rows($resultc);
                    echo " Comments(".$count_comments.")";
                    ?>
                        <div >
                            <h3><?php echo $title;?></h3>
                            <p>
                                <?php
                                echo "by ".$name;
                                ?>
                            </p>
                            <a class="btn btn-secondary" href=full_post.php?id=<?php echo $id;?>>View Full Post</a>
                        </div>
                </div>
            </div>
            <?php
            }
        }
    }
    ?>
    </div>
</div>


 
</body>
</html>
<?php
    
include("footer.php");
?>

