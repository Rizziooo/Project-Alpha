<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['wachtwoord'];
		$gender = $_POST["gender"];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			$hashed_wachtwoord = password_hash($password, PASSWORD_DEFAULT);

			//save to database
			// $id = random_num(20);
			// $query = "insert into login (username,email,wachtwoord) values ('$username','$email','$hashed_wachtwoord')";
			// $sql = "INSERT INTO users (email, wachtwoord) VALUES ('$email',$hashed_wachtwoord')";

			// mysqli_query($conn, $query);

			$stmt = $conn->prepare("INSERT INTO users (email, wachtwoord) VALUES (?, ?)");
			// $stmt->bind_param("ss", $email, $hashed_wachtwoord);
			echo "email=$email, hash= $hashed_wachtwoord";
			$stmt->bind_param("ss",$email,$hashed_wachtwoord);

			if ($stmt->execute()){

			header("Location: login.php");
			die;
		}else
		{

}
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Aanmelden</title>
</head>
<body>
<link rel="stylesheet" href="styles.css">
<div id="container">
        <div id="logo">
            <img src="appotheek_logo.png" alt="Logo" width="300">
        </div>
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Aanmelden</div>

			<input id="username" type="text" name="username" placeholder="gebruikersnaam"><br><br>
			<input id="email" type="email" name="email" placeholder="email"><br><br>
			<input id="wachtwoord" type="password" name="wachtwoord" placeholder="wachtwoord"><br><br>	
			<input type="radio" name="gender" value="male">Male
			<input type="radio" name="gender" value="female">Female

			<input id="button" type="submit" value="Aanmelden"><br><br>

			<a href="login.php">Login</a><br><br>
		</form>
	</div>
</body>
</html>