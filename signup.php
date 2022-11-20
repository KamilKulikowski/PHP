<!DOCTYPE html>
<html>
<head>
	<title>Zarejestruj</title>
	<link rel="stylesheet" type="text/css" href="style.scss">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Zarejestruj</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Nazwa Użytkownika</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Nazwa Użytkownika"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Nazwa Użytkownika"><br>
          <?php }?>

          <label>Email</label>
          <?php if (isset($_GET['uemail'])) { ?>
               <input type="email" 
                      name="uemail" 
                      placeholder="Email"
                      value="<?php echo $_GET['uemail']; ?>"><br>
          <?php }else{ ?>
               <input type="email" 
                      name="uemail" 
                      placeholder="Email"><br>
          <?php }?>

     	<label>Hasło</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Hasło"><br>

          <label>Powtórz Hasło</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Powtórz Hasło"><br>

     	<button type="submit">Zarejestruj</button>
          <a href="index.php" class="ca">Masz już konto?</a>
     </form>
</body>
</html>






