<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['uemail']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$uemail = validate($_POST['uemail']);

	$user_data = 'uname='. $uname. '&uemail='. $uemail;

	if (empty($uname)) {
		header("Location: signup.php?error=Nazwa użytkownika jest wymagana&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Hasło jest wymagane&$user_data");
	    exit(); 
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Powtórzenie Hasła jest wymagane&$user_data");
	    exit();
	}

	else if(empty($uemail)){
        header("Location: signup.php?error=Email jest wymagany&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=Hasła się nie zgadzają&$user_data");
	    exit();
	}
	else{
        $pass = md5($pass);

		$sql = "SELECT * FROM users WHERE user_name='$uname'";
		$result = $connection -> query($sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=Nazwa użytkownika jest już zajęta&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, email) VALUES('$uname', '$pass', '$uemail')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Twoje konto zostało utworzone pomyślnie");
	         exit();
           }else {
	           	header("Location: signup.php?error=nieznany błąd&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}





