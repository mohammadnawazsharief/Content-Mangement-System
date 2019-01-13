<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php confirm_Login(); ?>
<?php
if(isset($_POST["Submit"]))
{
    $Title=mysqli_real_escape_string($connection,$_POST["Title"]);
    $Category=mysqli_real_escape_string($connection,$_POST["Category"]);
    $Post=mysqli_real_escape_string($connection,$_POST["Post"]);
    date_default_timezone_set("Asia/kolkata");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $Admin=$_SESSION["User_Name"];
    $Image=$_FILES['Image']['name'];
    $Target="uploads/".basename($_FILES['Image']['name']);
    if(empty($Title))
    {
    $_SESSION["ErrorMessage"]="Title cannot be Empty";
    Redirect_to("AddNewPost.php");

    }
    elseif(strlen($Title)<2)
    {
    $_SESSION["ErrorMessage"]="Title should be atleast 2 characters";
    Redirect_to("AddNewPost.php");

    }
    elseif(strlen($Post)>9999)
    {
    $_SESSION["ErrorMessage"]="Post should be less than 9999 characters";
    Redirect_to("AddNewPost.php");
    }
    else
    {
      global $connection;
      $Query="INSERT INTO admin_panel(datetime,title,category,author,image,post)
      VALUES('$DateTime','$Title','$Category','$Admin','$Image','$Post')";
      $Execute=mysqli_query($connection,$Query);
      move_uploaded_file($_FILES['Image']['tmp_name'],$Target);
      if($Execute)
      {
        $_SESSION["SuccessMessage"]="Post Added Successfully";
        Redirect_to("AddNewPost.php");
      }
      else
      {
        $_SESSION["ErrorMessage"]="Something went wrong, try again";
        Redirect_to("AddNewPost.php");

      }

    }

}


?>

<!doctype HTML>
<html>
<head>
	<title> Add New Post</title>
	<link rel= "stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.min.js"> </script>
	<script src="js/bootstrap.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel= "stylesheet" href="css/adminstyles.css">

</head>
<style media="screen" type="text/css">
.fieldinfo{

  color:rgb(251,174,44);
  font-family: Bitter, Georgia, Times;
  font-size: 1.2em;
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
							<li><a href="Blog.php" target="_blank"> Blog </a></li>
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


<div class="container-fluid">
<div class="row">


	<div class="col-sm-2">

			<ul id= "side_menu" class="nav nav-pills nav-stacked">
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-th"> Dashboard</span></a></li>
				<li class="active"><a  href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"> Add New Post</span></a></li>
				<li><a  href="categories.php"><span class="glyphicon glyphicon-tags"> Categories</span></a></li>
				<li><a  href="Admins.php"><span class="glyphicon glyphicon-user"> Manage Admins</span></a></li>
				<li><a  href="comments.php"><span class="glyphicon glyphicon-comment"> Comments</span></a></li>
				<li><a  href="Blog.php"><span class="glyphicon glyphicon-equalizer"> Live Blog</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-log-out"> Log Out</span></a></li>


			</ul>
	</div><!-- ending of side area col sm 2 -->
	<div class="col-sm-10">
    <h1>Add New Post</h1>
    <div>
        <?php echo Message();
         echo SuccessMessage();?>
    </div>

    <div><!-- Form div -->

      <form  action="AddNewPost.php" method="post" enctype="multipart/form-data">
        <fieldset>
          <div class="form-group">
              <label for="title"><span class="fieldinfo">Title:</span></label>
              <input class="form-control" type="text" name="Title" id="title" placeholder="Title" value="">
          </div> <!-- form group  -->
          <div class="form-group">
              <label for="categoryselect"><span class="fieldinfo"> Category:</span></label>
              <select class="form-control" id="categoryselect" name="Category" style="height:2.5em;">
                  <?php
                  global $connection;
                  $ViewQuery= "SELECT * FROM category ORDER BY datetime desc";
                  $Execute=mysqli_query($connection, $ViewQuery);
                  while ($DataRows=mysqli_fetch_array($Execute))
                    {
                    $ID=$DataRows['id'];
                    $CategoryName=$DataRows['name'];

                  ?>
                  <option><?php echo $CategoryName; ?></option>
              <?php } ?>

              </select>
          </div>

          <div class="form-group">
              <label for="imageselect"><span class="fieldinfo">Select Image:</span></label>
              <input type="File" class="form-control" name="Image" id="imageselect" style="height:2.9em;">
          </div>

          <div class="form-group">
              <label for="postarea"><span class="fieldinfo">Post:</span></label>
              <textarea class="form-control" name="Post" id="postarea" rows="4" cols="25"></textarea>

          <br>
          <input class="btn btn-success btn-block" type="submit" name="Submit" value="ADD NEW POST">
          <br>
        </fieldset>

      </form>

    </div>

</div><!-- Ending of form div   -->

	</div><!--Ending of main area col-sm-10  -->
</div><!--  Ending of Row -->

</div><!-- Ending of Container  -->

<div id="footer">
<hr><p>Theme by | Mohamamd Nawaz |&copy; 2018-2020 -- ALL RIGHTS RESERVED</p>
<a style="color:white; text-decoration:none; cursor:pointer; font-weight:bold;" href="https://mohammadnawaz.com"></a>
<p>This site is only used for reference purpose Mohammadnawaz.com have all the rights.No one is allowed to distribute copies other than &trade;Mohammad Nawaz </p>
<hr>
</div>
<div style="height:10px; background-color:#27AAE1;">

</div>
</body>
</html>
