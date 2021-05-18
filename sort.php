<?php
session_start();
include("db.php"); //data connection
include("user_navbar.php");
if(isset($_POST['sort']))
{
    $choose=$_POST['cat'];
?>
<html>
<head>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/nav.css">
</head>
<body>
<br>
<br>
 <div align="center">
    <h1><?php echo "Sorted by ".$choose;?></h1>
 </div>
<!--bootstrap js-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
                         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>       
</body>
</html>
<?php    
     
                if($choose=="likes")
                {
                    $query="SELECT * FROM blogs natural join sort ORDER BY likes DESC";
                }
                else if($choose=="dislikes")
                {
                    $query="SELECT * FROM blogs natural join sort ORDER BY dislikes DESC";
                }
                else
                {
                    $query="SELECT * FROM blogs natural join sort ORDER BY comments DESC";
                }    

                $result=mysqli_query($con,$query);
                while ($row = mysqli_fetch_array($result))
                {   $id=$row["id"];
                    $name=$row["name"];
                    $type=$row["type"];
                    $category=$row["category"];
                    $title=$row["title"];
                    $description=$row["description"];
                    $blog_image=$row['blog_image'];
                    $likes=$row['likes'];
                    $dislikes=$row['dislikes'];
                    $comments=$row['comments'];
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
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
                <body class="back">
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
                </body>
                </html>
                <?php
                    
                
                   
                }
                
                }
                ?>
                
                <div align="center">

                 <a  class="btn btn-light"  href=dashboard.php>Back To Dashboard</a>
                 </div>
                 <br>
                 <br>
                
                <?php
                include("footer.php")
                ?>