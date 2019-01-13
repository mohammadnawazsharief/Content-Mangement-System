<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php confirm_Login(); ?>
<?php
if(isset($_POST["Submit"]))
{
    $UserName=mysqli_real_escape_string($connection,$_POST["UserName"]);
    $Password=mysqli_real_escape_string($connection,$_POST["Password"]);
    $ConfirmPassword=mysqli_real_escape_string($connection,$_POST["ConfirmPassword"]);
    date_default_timezone_set("Asia/kolkata");
    $CurrentTime=time();
    //$DateTime=strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $Admin=$_SESSION["User_Name"];
    if(empty($UserName)||empty($Password)||empty($ConfirmPassword))
    {
    $_SESSION["ErrorMessage"]="All Fields must be filled out";
    Redirect_to("Admins.php");

    }
    elseif(strlen($Password)<4)
    {
    $_SESSION["ErrorMessage"]="Atleast 4 characters for Password are required";
    Redirect_to("Admins.php");

    }
    elseif ($Password!==$ConfirmPassword) {
    $_SESSION["ErrorMessage"]="Password/Confirm Password doesn't match, Try Again";
    Redirect_to("Admins.php");

    }
    else
    {
      global $connection;
      $Query="INSERT INTO registration(datetime,username,password,addedby)
      VALUES('$DateTime','$UserName','$Password','$Admin')";
      $Execute=mysqli_query($connection,$Query);
      if($Execute)
      {
        $_SESSION["SuccessMessage"]="Admin Added Successfully";
        Redirect_to("Admins.php");
      }
      else
      {
        $_SESSION["ErrorMessage"]="Admin failed to Add";
        Redirect_to("Admins.php");

      }

    }

}


?>

<!doctype HTML>
<html>
<head>
	<title>Admins</title>
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
				<li><a  href="categories.php"><span class="glyphicon glyphicon-tags"> Categories</span></a></li>
				<li  class="active"><a  href="Admins.php"><span class="glyphicon glyphicon-user"> Manage Admins</span></a></li>
				<li><a  href="comments.php"><span class="glyphicon glyphicon-comment"> Comments</span></a></li>
				<li><a  href="Blog.php"><span class="glyphicon glyphicon-equalizer"> Live Blog</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-log-out"> Log Out</span></a></li>


			</ul>
	</div><!-- ending of side area col sm 2 -->
	<div class="col-sm-10">
    <h1>Manage Admin Access</h1>
    <div>
        <?php echo Message();
         echo SuccessMessage();?>
    </div>
    <div>

      <form  action="Admins.php" method="post">
        <fieldset>
          <div class="form-group"> <!-- Form Group is just for Optimum spacing around inputs -->
              <label for="UserName"><span class="fieldinfo">UserName:</span></label>
              <input class="form-control" type="text" name="UserName" id="UserName" placeholder="UserName" value="">
              <!-- form control is for styling, hover effects and Full width (block) of the input    -->
          </div> <!-- form group  -->

          <div class="form-group"> <!-- Form Group is just for Optimum spacing around inputs -->
              <label for="Password"><span class="fieldinfo">Password:</span></label>
              <input class="form-control" type="password" name="Password" id="Password" placeholder="Password" value="">
              <!-- form control is for styling, hover effects and Full width (block) of the input    -->
          </div> <!-- form group  -->

          <div class="form-group"> <!-- Form Group is just for Optimum spacing around inputs -->
              <label for="ConfirmPassword"><span class="fieldinfo">Confirm Password:</span></label>
              <input class="form-control" type="password" name="ConfirmPassword" id="ConfirmPassword" placeholder="Re-type same password" value="">
              <!-- form control is for styling, hover effects and Full width (block) of the input    -->
          </div> <!-- form group  -->

          <br>
          <input class="btn btn-success btn-block" type="submit" name="Submit" value="ADD NEW ADMIN">
          <br>
        </fieldset>

      </form>

    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <tr>
          <th>Sr.No</th>
          <th>Date $ TIme</th>
          <th>Admin Name</th>
          <th>Added By</th>
          <th>Action</th>
        </tr>
        <?php
        global $connection;
        $ViewQuery= "SELECT * FROM registration ORDER BY datetime desc";
        $Execute=mysqli_query($connection, $ViewQuery);
        $SrNo=0;
        while ($DataRows=mysqli_fetch_array($Execute)) {
          // code...
          $Id=$DataRows['id'];
          $DateTime=$DataRows['datetime'];
          $UserName=$DataRows['username'];
          $Admin=$DataRows['addedby'];
          $SrNo++;


        ?>
        <tr>
          <td><?php echo $SrNo; ?></td>
          <td><?php echo $DateTime; ?></td>
          <td><?php echo $UserName; ?></td>
          <td><?php echo $Admin; ?></td>
          <td><a href="DeleteAdmin.php?Id=<?php echo $Id; ?>">
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
