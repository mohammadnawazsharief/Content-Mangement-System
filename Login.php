<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php
if(isset($_POST["Submit"]))
{
    $UserName=mysqli_real_escape_string($connection,$_POST["UserName"]);
    $Password=mysqli_real_escape_string($connection,$_POST["Password"]);


    if(empty($UserName)||empty($Password))
    {
    $_SESSION["ErrorMessage"]="All Fields must be filled out";
    Redirect_to("Login.php");

    }
    else {
      $Found_Account=Login_Attempt($UserName,$Password);
      $_SESSION["User_Id"]=$Found_Account["id"];
      $_SESSION["User_Name"]=$Found_Account["username"];
      if ($Found_Account) {
        $_SESSION["SuccessMessage"]="Welcome  {$_SESSION["User_Name"]} ";
        Redirect_to("dashboard.php");

      }else {
        $_SESSION["ErrorMessage"]="Login Failed, Invalid Username and/Or Password";
        Redirect_to("Login.php");

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
body{
  background-color: #fff;
}
</style>
<body>
  <div class="" style="height:10px; background-color:#27AAE1"></div>
	<nav class="navbar navbar-inverse" role="navigation"> <!--  role is used for screen readers   -->
		<div class="container">
			<div class="navbar-header">


			<a class="navbar-brand " href="Blog.php">  <img style=" margin-top:-15px;" src="/phpcms/images/mohammadnawaz.jpg" width="200"; height="50";> </a>
			</div>

			<div class="collapse navbar-collapse" id="collapse">


			</div> <!--  Div of collapse navbar-collapse   -->

		</div>

	</nav>
	<div class="" style="margin-top:-20px; height:10px; background-color:#27AAE1"></div>



<div class="container-fluid">
<div class="row">

  <div class="col-sm-offset-4 col-sm-4">

    <br><br><br><br><br><br>
    <div>
        <?php echo Message();
         echo SuccessMessage();?>
    </div>
    <h2>Welcome Back!</h2>


    <div>

      <form  action="Login.php" method="post">
        <fieldset>
          <div class="form-group"> <!-- Form Group is just for Optimum spacing around inputs -->
              <label for="UserName"><span class="fieldinfo">UserName:</span></label>
                  <div class="input-group input-group-lg"><!--  Input Group is used for Add ON's -->
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-envelope text-primary"></span>
                  </span>
                  <input class="form-control" type="text" name="UserName" id="UserName" placeholder="UserName" value="">
              <!-- form control is for styling, hover effects and Full width (block) of the input    -->

                  </div><!-- Inpur Group ending   -->
          </div> <!-- form group  -->

          <div class="form-group"> <!-- Form Group is just for Optimum spacing around inputs -->
              <label for="Password"><span class="fieldinfo">Password:</span></label>
              <div class="input-group input-group-lg"><!--  Input Group is used for Add ON's -->
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-lock text-primary"></span>
                </span>

              <input class="form-control" type="password" name="Password" id="Password" placeholder="Password" value="">
              <!-- form control is for styling, hover effects and Full width (block) of the input    -->
              </div><!-- Inpur Group ending   -->
          </div> <!-- form group  -->



          <br>
          <input class="btn btn-info btn-block" type="submit" name="Submit" value="LOGIN">
          <br>
        </fieldset>

      </form>

    </div>


	</div><!--Ending of main area col-sm-4  -->
</div><!--  Ending of Row -->

</div><!-- Ending of Container  -->



</div>
</body>
</html>
