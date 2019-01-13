<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php confirm_Login(); ?>
<?php
if(isset($_POST["Submit"]))
{
    $Category=mysqli_real_escape_string($connection,$_POST["Category"]);
    date_default_timezone_set("Asia/kolkata");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $Admin=$_SESSION["User_Name"];
    if(empty($Category))
    {
    $_SESSION["ErrorMessage"]="All Fields must be filled out";
    Redirect_to("categories.php");

    }
    elseif(strlen($Category)>99)
    {
    $_SESSION["ErrorMessage"]="Too long Name for Category";
    Redirect_to("categories.php");

    }
    else
    {
      global $connection;
      $Query="INSERT INTO category(datetime,name,creatorname)
      VALUES('$DateTime','$Category','$Admin')";
      $Execute=mysqli_query($connection,$Query);
      if($Execute)
      {
        $_SESSION["SuccessMessage"]="Category Added Successfully";
        Redirect_to("Categories.php");
      }
      else
      {
        $_SESSION["ErrorMessage"]="Category failed to Add";
        Redirect_to("Categories.php");

      }

    }

}


?>

<!doctype HTML>
<html>
<head>
	<title> Categories</title>
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
				<li><a  href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"> Add New Post</span></a></li>
				<li class="active"><a  href="categories.php"><span class="glyphicon glyphicon-tags"> Categories</span></a></li>
				<li><a  href="Admins.php"><span class="glyphicon glyphicon-user"> Manage Admins</span></a></li>
				<li><a  href="comments.php"><span class="glyphicon glyphicon-comment"> Comments</span></a></li>
				<li><a  href="Blog.php"><span class="glyphicon glyphicon-equalizer"> Live Blog</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-log-out"> Log Out</span></a></li>


			</ul>
	</div><!-- ending of side area col sm 2 -->
	<div class="col-sm-10">
    <h1>Manage Categories</h1>
    <div>
        <?php echo Message();
         echo SuccessMessage();?>
    </div>
    <div>

      <form  action="categories.php" method="post">
        <fieldset>
          <div class="form-group"> <!-- Form Group is just for Optimum spacing around inputs -->
              <label for="categoryname"><span class="fieldinfo">Name:</span></label>
              <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Name" value="">
              <!-- form control is for styling, hover effects and Full width (block) of the input    -->
          </div> <!-- form group  -->

          <br>
          <input class="btn btn-success btn-block" type="submit" name="Submit" value="ADD NEW CATEGORY">
          <br>
        </fieldset>

      </form>

    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <th>Sr.No</th>
          <th>Date $ TIme</th>
          <th>Category Name</th>
          <th>Creator Name</th>
          <th>Action</th>
        </tr>
        <?php
        global $connection;
        $ViewQuery= "SELECT * FROM category ORDER BY datetime desc";
        $Execute=mysqli_query($connection, $ViewQuery);
        $SrNo=0;
        while ($DataRows=mysqli_fetch_array($Execute)) {
          // code...
          $Id=$DataRows['id'];
          $DateTime=$DataRows['datetime'];
          $CategoryName=$DataRows['name'];
          $CreatorName=$DataRows['creatorname'];
          $SrNo++;


        ?>
        <tr>
          <td><?php echo $SrNo; ?></td>
          <td><?php echo $DateTime; ?></td>
          <td><?php echo $CategoryName; ?></td>
          <td><?php echo $CreatorName; ?></td>
          <td><a href="DeleteCategory.php?Id=<?php echo $Id; ?>">
            <span class="btn btn-danger">Delete</span></a> </td>
        </tr>
        <?php
        }
        ?>
      </table>

    </div>

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
