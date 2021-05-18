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
    include("all_profile.php")
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
            <br>
            <br>
            
            <div class="container" >
                <div class="row">
                <!-- <div class="col-sm">
                </div> -->
                    <div class="col-sm-20" align="center">
                        <form id="category" method="POST" action="categories.php">
                            <select style="width:20%"class="form-select form-select-sm" aria-label=".form-select-sm example" id="category" name="category"  required>
                                <option selected disabled hidden>Choose an Option</option>
                                <option value="Phones">Phones</option>
                                <option value="Pc">PC</option>
                                <option value="Gadgets">Gadgets</option>
                                <option value="Others">Others</option>
                            </select>
                            <div class="row">
                                <div class="col" style="margin-left:180px">
                                    <button type="submit" class="btn btn-secondary" name="post" >Submit</button>
                                </div>
                            </div>
                        </form>
                                <br>    
                        <form id="sort" method="POST" action="sort.php">
                            <select style="width:20%"class="form-select form-select-sm" aria-label=".form-select-sm example" id="category" name="cat"  required>
                                <option selected disabled hidden>Sort your dashboard by</option>
                                <option value="likes">Likes</option>
                                <option value="dislikes">Dislikes</option>
                                <option value="comments">Comments</option>
                            </select>
                            
                            <div class="row">
                                <div class="col" style="margin-left:200px">
                                    <button type="submit" class="btn btn-secondary" name="sort" >Sort</button>
                                </div>
                            </div>
                        </form>
                    </div>
                <!-- <div class="col-sm">
                    
                </div> -->
                </div>
            
            
            <br>
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
            <img class="image"src="images/<?php echo $blog_image;?>"width="400px" height="260px">
            <br>
            <br>
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
                <p style="color:blue"><?php echo $category;?>&nbsp&nbsp&nbsp<?php echo $type;?></p>
                <p class="des"><?php echo substr("$description",0,500).".....";?></p>
                
                <a class="btn btn-secondary" href=full_post.php?id=<?php echo $id;?>>View Full Post</a>
                
                <br>
            </div>
            <br>
        </div>
        <hr style="width:100%">
    </div>
</div>


 
</body>
</html>
<?php
    

   
}

}
include("footer.php");
?>

