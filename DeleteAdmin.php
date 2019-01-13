<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php confirm_Login(); ?>
<?php
if (isset($_GET['Id']))
{
  // code...
  $IdFromUrl=$_GET['Id'];
  global $connection;
  $Query="DELETE FROM registration WHERE id='$IdFromUrl'";
  $Execute=mysqli_query($connection,$Query);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="Admin Deleted Successfully";
    Redirect_to("Admins.php");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong, try again";
    Redirect_to("Admins.php");
  }

}

?>
