<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php
function Redirect_to($New_Location){
    header("Location:".$New_Location);
    exit;
}

function Login_Attempt($UserName,$Password){
  global $connection;
  $Query="SELECT * FROM registration
  WHERE username='$UserName' AND password='$Password'";
  $Execute=mysqli_query($connection, $Query);
  if ($admin=mysqli_fetch_array($Execute)) {
    return $admin;
  }else {
    return null;
  }
}

function Login(){
  if (isset($_SESSION["User_Id"])) {
    return true;
  }
}
function confirm_Login(){
  if (!Login()) {
    $_SESSION["ErrorMessage"]="Login Required ";
    Redirect_to("Login.php");
  }
}


?>
