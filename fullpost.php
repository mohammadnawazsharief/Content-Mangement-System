<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php confirm_Login(); ?>
<?php
if(isset($_POST["Submit"]))
{
    $Name=mysqli_real_escape_string($connection,$_POST["Name"]);
    $Email=mysqli_real_escape_string($connection,$_POST["Email"]);
    $Comments=mysqli_real_escape_string($connection,$_POST["Comments"]);
    date_default_timezone_set("Asia/kolkata");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;

    if(empty($Name)||empty($Email)||empty($Comments))
    {
    $_SESSION["ErrorMessage"]="All Fields are required";

    }
    elseif(strlen($Comments)>500)
    {
    $_SESSION["ErrorMessage"]="Only 500 characters are allowed";

    }
    else
    {
      $PostId=$_GET['Id'];
      global $connection;
      $Query="INSERT INTO comments (datetime,name,email,comments,approveby,status,admin_panel_id)
      VALUES ('$DateTime','$Name','$Email','$Comments','pending','OFF','$PostId')";

      $Execute=mysqli_query($connection,$Query);

      if($Execute)
      {
        $_SESSION["SuccessMessage"]="Comments Posted Successfully";
        Redirect_to("fullpost.php?Id={$PostId}");
      }
      else
      {
        $_SESSION["ErrorMessage"]="Something went wrong, try again";
        Redirect_to("fullpost.php?Id={$PostId}");

      }

    }

}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, Initial-scale=1">

    <title>Full Blog Post</title>
    <!-- Downloaded Bootstrap-3.3.7   -->
    <link rel="stylesheet" type="text/css" href="/phpcms/css/bootstrap.css">

    <!-- CDN  -->
   <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="publicstyles.css">




  </head>
  <style media="screen">
    .fieldinfo{
      color: rgba(251, 174, 44);
      font-family: Bitter, georgia, Times;
      font-size: 1.2em;
    }
    .comment-blog{
      background-color: #F7F6F9;
    }
    .comment-info{
      color:#365899;
      font-family: sans-serif;
      font-size: 1.1em;
      font-weight: bold;
      padding-top: 10px;

    }
    .comment{
      margin-top: -2px;
      padding-bottom: 10px;
      font-size:1.1em;
    }

  </style>

  <body>

    <div class="" style="height:10px; background-color:#27AAE1"></div>
    <nav class="navbar navbar-inverse" role="navigation"> <!--  role is used for screen readers   -->
      <div class="container">
        <div class="navbar-header">
          <!-- Bread Crum sandwitch Icon     -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" >
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="Blog.php">  <img style="margin-top:-15px;" src="/phpcms/images/mohammadnawaz.jpg" width="200"; height="50";> </a>
        </div>

        <div class="collapse navbar-collapse" id="collapse">



              <ul class="nav navbar-nav">
                <li><a href="#"> Home </a></li>
                <li class="active"><a href="Blog.php"> Blog </a></li>
                <li><a href="#"> AboutUs </a></li>
                <li><a href="#"> Services </a></li>
                <li><a href="#"> Contact us </a></li>
                <li><a href="#"> Features </a></li>
              </ul>
              <form class="navbar-form navbar-right" action="Blog.php" >
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search" name="Search" value="">
                </div>
                <button class="btn btn-success"  name="SearchButton">Go</button>



              </form>

        </div> <!--  Div of collapse navbar-collapse   -->

      </div>

    </nav>
    <div class="" style="margin-top:-20px; height:10px; background-color:#27AAE1"></div>

    <div class="container">
      <div class="blog-header">
        <h1>The Complete responsive CMS Blog</h1>
        <p class="lead">The complete blog using PHP by Mohamamd Nawaz</p>
      </div>

      <div class="row">
        <div class="col-sm-8"> <!-- Main area of the Blog   --->
          <div>
              <?php echo Message();
               echo SuccessMessage();?>
          </div>
          <?php
          global $connection;
          if (isset($_GET["SearchButton"]))
          {
            // code...
            $Search=$_GET["Search"];
            $ViewQuery="SELECT * FROM admin_panel WHERE
                        datetime LIKE '%$Search%' OR title LIKE '%$Search%'
                        OR category LIKE '%$Search%' OR post LIKE '%$Search%' ";

          }
          else
          {
            // code...
            $PostIDFromUrl=$_GET['Id'];
            $ViewQuery="SELECT * FROM admin_panel WHERE id='$PostIDFromUrl' ORDER BY datetime desc";

          }
          $Execute=mysqli_query($connection,$ViewQuery );
          while ($DataRows=mysqli_fetch_array($Execute))
          {
            // code...
            $PostId=$DataRows['id'];
            $DateTime=$DataRows['datetime'];
            $Title=$DataRows['title'];
            $Category=$DataRows['category'];
            $Author=$DataRows['author'];
            $Image=$DataRows['image'];
            $Post=$DataRows['post'];

          ?>
          <div class="blogpost thumbnail"> <!--  blogpost is the custom style and not the bootstrap class  -->
            <img class="img-responsive img-rounded" src="uploads/<?php echo $Image; ?> ">
            <div class="caption">
              <h1 id="heading"><?php echo htmlentities($Title); ?></h1>
              <p class="description">Category:<?php echo htmlentities($Category); ?>  Published on: <?php echo htmlentities($DateTime); ?></p>
              <p class="post">Post:
                <?php echo nl2br($Post); ?>
              </p>
            </div>

          </div>
    <?php } ?>
    <br><br>
    <span class="fieldinfo">Comments:</span> <br>
    <?php
    global $connection;
    $PostIdForComments=$_GET['Id'];
    $ExtractingCommentsQuery="SELECT * FROM comments
    where admin_panel_id='$PostIdForComments' AND status='ON'";
    $Execute=mysqli_query($connection,$ExtractingCommentsQuery);
    while ($DataRows=mysqli_fetch_array($Execute))
    {
      // code...
      $CommentDate=$DataRows['datetime'];
      $CommentorName=$DataRows['name'];
      $CommentByUsers=$DataRows['comments'];


    ?>
    <div class="comment-blog">
        <img style="margin-left:10px; margin-top:10px;" class="pull-left" src="images\Commentor_Image2.jpg" width="70" height="70">
        <p style="margin-left:90px;" class="comment-info"><?php echo $CommentorName; ?> </p>
        <p style="margin-left:90px;" class="description"><?php echo $CommentDate; ?> </p>
        <p style="margin-left:90px;" class="comment"><?php echo nl2br($CommentByUsers); ?> </p>
    </div>

    <hr>
<?php } ?>

    <span class="fieldinfo">Share Your thoughts about this post</span>
    <div><!-- Form div -->

      <form  action="fullpost.php?Id=<?php echo $PostId; ?>" method="post" enctype="multipart/form-data">
        <fieldset>
          <div class="form-group">
              <label for="Name"><span class="fieldinfo">Name:</span></label>
              <input class="form-control" type="text" name="Name" id="Name" placeholder="Title" value="">
          </div> <!-- form group  -->
          <div class="form-group">
              <label for="email"><span class="fieldinfo">Email:</span></label>
              <input class="form-control" type="text" name="Email" id="Email" placeholder="Email" value="">
          </div>



          <div class="form-group">
              <label for="Commentarea"><span class="fieldinfo">Comments:</span></label>
              <textarea class="form-control" name="Comments" id="Commmentarea" rows="4" cols="25"></textarea>

              <br>
              <input class="btn btn-primary" type="submit" name="Submit" value="Submit">
              <br>
          </fieldset>

          </form>

          </div>

    </div><!-- Ending of form div   -->

    <!-- Main area ending    -->

    <!-- Side area  -->
      <div class="col-sm-offset-1 col-sm-3">


        <h2>About Me</h2>
        <img class="img-responsive img-circle " src="images/funny.jpg" alt="">
        <p>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
          Praesent sapien massa, convallis a pellentesque nec,
          egestas non nisi. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
         Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.
         Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.
         Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.
       </p>


        <!-- side area Panels   -->
        <div class="panel panel-primary">
           <div class="panel-heading">
               <h2 class="panel-title">Categories</h2>
           </div>

           <div class="panel-body"style="background-color:#F6F7F9" >
               <?php
               global $connection;
               $ViewQuery="SELECT * FROM category ORDER BY datetime desc";
               $Execute=mysqli_query($connection, $ViewQuery);
               while ($DataRows=mysqli_fetch_array($Execute))
               {
                   $Id=$DataRows['id'];
                   $Category=$DataRows['name'];

               ?>
               <a href="Blog.php?Category=<?php echo $Category; ?> ">
               <span id='heading'> <?php echo $Category.'<br>'; ?></span>
               </a>
         <?php } ?>
           </div>
           <div class="panel-footer">

           </div>
        </div>


        <div class="panel panel-primary">
           <div class="panel-heading">
               <h2 class="panel-title">Recent Posts</h2>
           </div>

           <div class="panel-body" style="background-color:#F6F7F9">
               <?php
               global $connection;
               $ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT 0,3 ";
               $Execute=mysqli_query($connection,$ViewQuery);
               while ($DataRows=mysqli_fetch_array($Execute))
               {
                 $Id=$DataRows['id'];
                 $Title=$DataRows['title'];
                 $DateTime=$DataRows['datetime'];
                 $Image=$DataRows['image'];
                 if (strlen($DateTime)>12) {
                   $DateTime=substr($DateTime,0,12);
                 }

               ?>
               <div class="">

                   <img class="pull-left" style="margin-top:2px; margin-left:5px;" src="uploads/<?php echo htmlentities($Image); ?>" width="60" height="60" >
                   <a href="fullpost.php?Id=<?php echo $Id; ?>">
                   <p id='heading' style="margin-left:90px;"><?php echo htmlentities($Title); ?> </p>
                   </a>
                   <p class="description" style="margin-left:90px;"><?php echo htmlentities($DateTime); ?> </p>
                   <hr>
               </div>

         <?php } ?>
          </div>
           <div class="panel-footer">

           </div>
        </div>

      </div><!-- Side area div ending  -->

     </div><!-- Row div ending    -->

   </div><!--  container div ending  --->
    <!-- Footer  -->
    <div id="footer">
    <hr><p>Theme by | Mohamamd Nawaz |&copy; 2018-2020 -- ALL RIGHTS RESERVED</p>
    <a style="color:white; text-decoration:none; cursor:pointer; font-weight:bold;" href="https://mohammadnawaz.com"></a>
    <p>This site is only used for reference purpose Mohammadnawaz.com have all the rights.No one is allowed to distribute copies other than &trade;Mohammad Nawaz </p>
    <hr>
    </div>
    <div style="height:10px; background-color:#27AAE1;"> <!-- Footer Ending   -->












    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
