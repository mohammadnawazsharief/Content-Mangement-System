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
    $Admin="Mohammad Nawaz";
    $Image=$_FILES['Image']['name'];
    $Target="uploads/".basename($_FILES['Image']['name']);


      global $connection;
      $DeleteFromURL=$_GET['Delete'];
      $Query="DELETE from admin_panel
      where id='$DeleteFromURL' ";

      $Execute=mysqli_query($connection,$Query);
      move_uploaded_file($_FILES['Image']['tmp_name'],$Target);
      if($Execute)
      {
        $_SESSION["SuccessMessage"]="Post Deleted Successfully";
        Redirect_to("dashboard.php");
      }
      else
      {
        $_SESSION["ErrorMessage"]="Something went wrong, try again";
        Redirect_to("dashboard.php");

      }



}


?>

<!doctype HTML>
<html>
<head>
	<title> Delete Post</title>
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
<div class="container-fluid">
<div class="row">


	<div class="col-sm-2">

			<ul id= "side_menu" class="nav nav-pills nav-stacked">
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-th"> Dashbpard</span></a></li>
				<li class="active"><a  href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"> Add New Post</span></a></li>
				<li><a  href="categories.php"><span class="glyphicon glyphicon-tags"> Categories</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-user"> Manage Admins</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-comment"> Comments</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-equalizer"> Live Blog</span></a></li>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-log-out"> Log Out</span></a></li>


			</ul>
	</div><!-- ending of side area col sm 2 -->
	<div class="col-sm-10">
    <h1>Delete Post</h1>
    <div>
        <?php echo Message();
         echo SuccessMessage();?>
    </div>
    <div>
      <?php
      $SearchQueryParameter= $_GET['Delete'];
      global $connection;
      $Query="SELECT * FROM admin_panel where id='$SearchQueryParameter'";
      $Execute=mysqli_query($connection,$Query);
      while ($DataRows=mysqli_fetch_array($Execute)) {
        // code...
        $TitleToBeUpdated=$DataRows['title'];
        $CategoryToBeUpdated=$DataRows['category'];
        $ImageToBeUpdated=$DataRows['image'];
        $PostToBeUpdated=$DataRows['post'];
      }

      ?>
      <form  action="DeletePost.php?Delete=<?php echo $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
        <fieldset>
          <div  class="form-group">
              <label for="title"><span class="fieldinfo">Title:</span></label>
              <input disabled class="form-control" type="text" name="Title" id="title" placeholder="Title" value="<?php echo $TitleToBeUpdated; ?>" >
          </div> <!-- form group  -->

          <div  class="form-group">
            <span class="fieldinfo">Existing Category:</span>
            <?php echo $CategoryToBeUpdated; ?>
            <br>
              <label for="categoryselect"><span class="fieldinfo"> Category:</span></label>
              <select  disabled class="form-control" id="categoryselect" name="Category" style="height:2.5em;">
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
            <span class="fieldinfo">Existing Image:</span>
            <img  src="uploads/<?php echo $ImageToBeUpdated; ?>" width="170" height="50" >
            <br>
              <label for="imageselect"><span class="fieldinfo">Select Image:</span></label>
              <input disabled type="File" class="form-control" name="Image" id="imageselect" style="height:2.9em;">
          </div>

          <div class="form-group">
              <label for="postarea"><span class="fieldinfo">Post:</span></label>
              <textarea disabled class="form-control" name="Post" id="postarea" rows="4" cols="25">
                <?php echo $PostToBeUpdated; ?>
              </textarea>

          <br>
          <input class="btn btn-danger btn-block" type="submit" name="Submit" value="Delete POST">
          <br>
        </fieldset>

      </form>

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
