<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<link rel="stylesheet" href="styles.css">
<div id="container">
        <div id="logo">
            <img src="1.png" alt="Logo" width="300">
        </div>

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: black;">Inloggen</div>

			<input id="email" type="email" name="email" placeholder="email"><br><br>
			<input id="wachtwoord" type="password" name="wachtwoord" placeholder="wachtwoord"><br><br>

			<input id="button" type="submit" value="Inloggen"><br><br>

			<a href="signup.php">Meld je hier aan</a><br><br>
		</form>
	</div>
</body>
</html>

<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['wachtwoord'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			//read from database
			$query = "select * from login where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['wachtwoord'] == $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Verkeerde Email of Wachtwoord!";
		}else
		{
			echo "Verkeerde Email of Wachtwoord!";
		}
	}

?>