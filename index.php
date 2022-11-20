<!DOCTYPE html>
<html>
<head>
	<title>Zaloguj</title>
	<link rel="stylesheet" type="text/css" href="style.scss">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Zaloguj</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nazwa Użytkownika</label>
     	<input type="text" name="uname" placeholder="Nazwa Użytkownika"><br>
     	<label>Hasło</label>
     	<input type="password" name="password" placeholder="Hasło"><br>
     	<button type="submit">Zaloguj</button>
          <a href="signup.php" class="ca">Stwórz konto</a>
     </form>
</body>
</html>


