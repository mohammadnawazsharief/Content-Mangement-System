<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, Initial-scale=1">

    <title>Blog</title>
    <!-- Downloaded Bootstrap-3.3.7   -->
    <link rel="stylesheet" type="text/css" href="/phpcms/css/bootstrap.css">

    <!-- CDN  -->
   <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="publicstyles.css">




  </head>

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

                      <!--  Main area  --->

      <div class="row">
        <div class="col-sm-8"> <!-- Main area of the Blog   --->
          <?php
          global $connection;
          if (isset($_GET["SearchButton"]))
          {
            //  This Query is for th searchButton
            $Search=$_GET["Search"];
            $ViewQuery="SELECT * FROM admin_panel WHERE
                        datetime LIKE '%$Search%' OR title LIKE '%$Search%'
                        OR category LIKE '%$Search%' OR post LIKE '%$Search%' ";

          }
          //This query is for the side panel category selection is active in URL TAB
          elseif (isset($_GET['Category'])) {
            $Category=$_GET['Category'];
            $ViewQuery="SELECT * FROM admin_panel WHERE category= '$Category' ORDER BY datetime desc ";

          }
          // this is for the pagination
          elseif (isset($_GET['Page']))
          {
                // Query when pagination is active i.e., Blog.php?Page=1
                $Page=$_GET['Page'];
                if ($Page==0||$Page<1) {
                  $ShowPostFrom=0;
                }
                else {

                $ShowPostFrom=($Page*3)-3;
                     }

                $ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc LIMIT $ShowPostFrom,3";


          }
          // this Query is for default
          else
          {
            // code...
            $ViewQuery="SELECT * FROM admin_panel ORDER BY datetime desc";

          }

          $Execute=mysqli_query($connection,$ViewQuery);
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
              <p class="description">Category:<?php echo htmlentities($Category); ?>
                                    Published on: <?php echo htmlentities($DateTime); ?>
                                    <!-- This is to show the comments   -->

                                    <?php
                      							global $connection;
                      							$QueryApproved="SELECT COUNT(*) FROM comments WHERE admin_panel_id ='$PostId'AND status='ON'";
                      							$ExecuteApproved=mysqli_query($connection,$QueryApproved);
                      							$RowsApproved=mysqli_fetch_array($ExecuteApproved);
                      							$TotalApproved=array_shift($RowsApproved);
                      							if ($TotalApproved>0)
                      							{

                      							?>
                      							<span class="badge pull-right">
                      							Comments: <?php echo $TotalApproved;
                      							?>
                      							</span>
                      				<?php } ?>


              </p>
              <p class="post">Post:
                <?php
                if (strlen($Post)>150) {
                  // code...
                  $Post=substr($Post,0,150).'...';
                }
                echo $Post ?>
              </p>
            </div>
            <a href="fullpost.php?Id=<?php echo $PostId; ?>"><span style="float:right;" class="btn btn-info">Read More &rsaquo; &rsaquo; </span> </a>
          </div>
    <?php } ?>

            <nav> <!-- This nav is for styling the pagination   -->
                <ul class="pagination pull-left pagination-lg">
              <!-- For the back arrow/button -->
              <?php
              if (isset($Page))
              {

                    if ($Page>1) {

                  ?>

                    <li><a href="Blog.php?Page=<?php echo $Page-1; ?>">&laquo; </a> </li>
                  <?php }
                }  ?>


                      <?php
                      global $connection;
                      $QueryPagination="SELECT COUNT(*) from admin_panel";
                      $ExecutePagination=mysqli_query($connection,$QueryPagination);
                      $RowPagination=mysqli_fetch_array($ExecutePagination);
                        $TotalPosts=array_shift($RowPagination);
                        $PostPagination=$TotalPosts/3;
                        $PostPagination=ceil($PostPagination);
                        //echo $PostPerPage;
                        for ($i=1; $i <=$PostPagination ; $i++)
                        {
                          // code...
                          if (isset($Page))
                          {

                                      if ($i==$Page)
                                  {



                          ?>


                                    <li class="active">  <a href="Blog.php?Page=<?php echo $i; ?>"> <?php echo $i; ?></a>  </li>
                      <?php
                                  }
                            else
                                  {
                            ?>
                                  <li>  <a href="Blog.php?Page=<?php echo $i; ?>"> <?php echo $i; ?></a>  </li>
                            <?php
                                  }


                            }

                          }
                        ?>
                        <!-- for the forward button/Arrow  --->
                        <?php
                        if (isset($Page))
                        {

                              if ($Page+1<=$PostPagination) {

                            ?>

                              <li><a href="Blog.php?Page=<?php echo $Page+1; ?>">&raquo;</a> </li>
                            <?php }
                          }  ?>
               </ul>

            </nav><!-- Ending of  pagination style nav  -->
  </div><!-- Main area ending    -->

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

            <div class="panel-body " style="background-color:#F6F7F9">
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
