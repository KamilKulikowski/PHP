<?php 
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['user_name'])) {
 ?>
<!DOCTYPE html>
<head>
     <div id="navbar">
          <ul>
               <li>Home<li>
               <li>About</li>
               <li>Other</li>
               <li>Contact</li>
          </ul>
     </div>

<html>

	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.scss">

     <h1>Cześć, <?php echo $_SESSION['user_name']; ?> twój email to: <?php echo $_SESSION['email'];?></h1>
     <a href="logout.php">Wyloguj</a>
</head>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>