<?php 
	
	include 'db_connect.php';

	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM users WHERE email=:email AND password=:password";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':password', $password);
	$stmt->execute();

	session_start();

	if ($stmt->rowCount() <= 0) 
	{
		if (!isset($_COOKIE['logInCount'])) 
		{
			$logInCount = 1;
		}

		else
		{
			$logInCount = $_COOKIE['logInCount'];
			$logInCount++;
		}

		setcookie('logInCount', $logInCount, time()+10);

		if ($logInCount > 3) 
		{
			// time_out design
			include('frontend_header.php');

			echo "<h1> Login In Failed for three times. Try again after 1 minute. </h1>";

			include('frontend_footer.php');

			echo "<script type=\"text/javascript\"> 
				(function(){
					setTimeout(function()
					{
						location.href='login.php';
					},10000);
				})();
			</script>";

			unset($_COOKIE['logInCount']);
			setcookie('logInCount', '', time()-10);
		}

		else
		{
			header("location: login");
		}


	}

	else
	{
		$user = $stmt->fetch(PDO::FETCH_ASSOC);

		// var_dump($user);

		// Admin
		if ($user['role_id'] == 1) 
		{
			header("location: category_list");
		}

		// Customer
		else
		{
			header("location: index");
		}
	}


	
















?>