<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Az ajtón se mész ki anélkül, hogy előtte bemennél!";
    header('location: ../main.php');
}

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location: ../index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<div class="header">
	<h2>filler html dokumentum loló</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="../main.php" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
		
</body>
</html>

