<?php require_once("include/DB.php"); ?>
<?php require_once("include/sessions.php"); ?>
<?php require_once("include/functions.php"); ?>
<?php confirm_Login(); ?>
<!doctype HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, Initial-scale=1">

	<title>Blog-Comments</title>
	<!-- Downloaded Bootstrap-3.3.7   -->
	<link rel="stylesheet" type="text/css" href="/phpcms/css/bootstrap.css">

	<!-- CDN  -->
 <link rel= "stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/adminstyles.css">




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

			<ul id= "side_menu" class="nav nav-pills nav-stacked"><br><br>
				<li><a  href="dashboard.php"><span class="glyphicon glyphicon-th"> Dashboard</span></a></li>
				<li><a  href="AddNewPost.php"><span class="glyphicon glyphicon-list-alt"> Add New Post</span></a></li>
				<li><a  href="categories.php"><span class="glyphicon glyphicon-tags"> Categories</span></a></li>
				<li><a  href="Admins.php"><span class="glyphicon glyphicon-user"> Manage Admins</span></a></li>
				<li class="active"><a  href="comments.php"><span class="glyphicon glyphicon-comment"> Comments</span></a></li>
				<li><a  href="Blog.php"><span class="glyphicon glyphicon-equalizer"> Live Blog</span></a></li>
				<li><a  href="Logout.php"><span class="glyphicon glyphicon-log-out"> Log Out</span></a></li>


			</ul>
	</div><!-- ending of side area col sm 2 -->
  <div class="col-sm-10"><!-- Main area   --->
    <div class="">
        <?php echo Message();
         echo SuccessMessage();?>
    </div>

    <h1>Un-Approved comments</h1>
    <div class="table-responsive">
      <table class="table table-striped table-hover">

          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Approve</th>
            <th>Delete Comment</th>
            <th>Details</th>
          </tr>
          <?php
          global $connection;
          $Query="SELECT * FROM comments where status='OFF'ORDER BY datetime desc";
          $Execute=mysqli_query($connection,$Query);
          $SrNo=0;
          while ($DataRows=mysqli_fetch_array($Execute)) {
            // code...
            $CommentId=$DataRows['id'];
            $DateTimeofComment=$DataRows['datetime'];
            $PersonName=$DataRows['name'];
            $PersonComment=$DataRows['comments'];
            $CommentedPostId=$DataRows['admin_panel_id'];
            $SrNo++;
            if (strlen($PersonComment)>10) {  $PersonComment=substr($PersonComment,0,10).'...' ; }
            if (strlen($PersonName)>6) {  $PersonName=substr($PersonName,0,6).'...' ; }


          ?>
          <tr>
            <td><?php echo htmlentities($SrNo); ?> </td>
            <td style="color:#5e5eff;"><?php echo htmlentities($PersonName); ?> </td>
            <td><?php echo htmlentities($DateTimeofComment); ?> </td>
            <td><?php echo htmlentities($PersonComment); ?> </td>
            <td><a href="ApproveComments.php?Id=<?php echo $CommentId; ?>"> <span class="btn btn-success">Approve</span> </a> </td>
            <td><a href="DeleteComments.php?Id= <?php echo $CommentId; ?>"><span class="btn btn-danger">Delete</span> </a> </td>
            <td><a href="fullpost.php?Id= <?php echo $CommentedPostId; ?>" target="_blank"><span class="btn btn-primary">Live Previre</span> </a> </td>
          </tr>
    <?php } ?>
      </table>

    </div>
    <!-- Approved Comments section   --->

    <h1>Approved comments</h1>
    <div class="table-responsive">
      <table class="table table-striped table-hover">

          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Approved By</th>
            <th>Revert Approve</th>
            <th>Delete Comment</th>
            <th>Details</th>
          </tr>
          <?php
          global $connection;
          $Admin=$_SESSION["User_Name"];
          $Query="SELECT * FROM comments where status='ON'ORDER BY datetime desc";
          $Execute=mysqli_query($connection,$Query);
          $SrNo=0;
          while ($DataRows=mysqli_fetch_array($Execute)) {
            // code...
            $CommentId=$DataRows['id'];
            $DateTimeofComment=$DataRows['datetime'];
            $PersonName=$DataRows['name'];
            $PersonComment=$DataRows['comments'];
						$ApprovedBy=$DataRows['approveby'];
            $CommentedPostId=$DataRows['admin_panel_id'];
            $SrNo++;
            if (strlen($PersonComment)>10) {  $PersonComment=substr($PersonComment,0,10).'...' ; }
            if (strlen($PersonName)>6) {  $PersonName=substr($PersonName,0,6).'...' ; }


          ?>
          <tr>
            <td><?php echo htmlentities($SrNo); ?> </td>
            <td style="color:#5e5eff;"><?php echo htmlentities($PersonName); ?> </td>
            <td><?php echo htmlentities($DateTimeofComment); ?> </td>
            <td><?php echo htmlentities($PersonComment); ?> </td>
						<td><?php echo htmlentities($ApprovedBy); ?> </td>
            
            <td><a href="DisApproveComments.php?Id= <?php echo $CommentId; ?>"><span class="btn btn-warning"> Dis-Approve</span> </a> </td>
            <td><a href="DeleteComments.php?Id= <?php echo $CommentId; ?>"><span class="btn btn-danger">Delete</span> </a> </td>
            <td><a href="fullpost.php?Id= <?php echo $CommentedPostId; ?>" target="_blank"><span class="btn btn-primary">Live Previre</span> </a> </td>
          </tr>
          </tr>
    <?php } ?>
      </table>

    </div>


  </div><!-- Main area ending  --->

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






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
