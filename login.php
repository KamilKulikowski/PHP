<?php 
session_start(); 
require_once "main.php";
$MainObject = new MainClass();
$connection=$MainObject->db_connect();
if ($connection->connect_error==0){
	$uname = htmlentities($_POST['uname'], ENT_QUOTES, "UTF-8");
	$pass = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
}

if (isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = htmlentities($_POST['uname'], ENT_QUOTES, "UTF-8");
	$pass = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

	if (empty($uname)) {
		header("Location: index.php?error=Nazwa Użytkownika jest wymagana");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Hasło jest wymagane");
	    exit();
	}else{

        $pass = $_POST['password'];
        
		$sql = sprintf(
			"SELECT * FROM users WHERE user_name='%s' AND password='%s'",
			mysqli_real_escape_string($connection, $uname),
			mysqli_real_escape_string($connection, $pass)
		);
		$result = $connection -> query($sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] == $uname && $row['password'] == $pass) {
				$_SESSION['zalogowany'] = $row['zalogowany'];
            	$_SESSION['user_name'] = $row['user_name'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: index.php?error=Niepoprawne hasło lub nazwa użytkownika");
		        exit();
			}
		}else{
			header("Location: index.php?error=Niepoprawne hasło lub nazwa użytkownika");
	        exit();
		}
	}

	
}else{
	header("Location: index.php");
	exit();
}



