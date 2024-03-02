<?php

    include("connection/conn.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
            $fullname = $_POST['fullname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
			$img = "../profile_pictures/default.jpg";
			$gmail = "Please Input information here!"; 
			$location = "Please Input information here!";  
			$number = "0000-000-0000";

            $sql = "INSERT INTO user_account (img,fullname,username,password,gmail,location,number) VALUES ('$img','$fullname','$username','$password','$gmail','$location')";
            mysqli_query($conn,$sql);

            echo "
                    <script>
                        alert('User Succesfully Created!');
                    </script>
            ";

            header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="register.css">
	</head>
	<body>
		<div class="login">
			<h1>DRRMs Register Portal</h1>
			<form action="register.php" method="post">
                 <label for="fullname">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="fullname" placeholder="Fullname" id="fullname" required>
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required><br>
                <p>Already have an account? </p><a href = "index.php" style = "text-decoration: none; margin-top: 16px; margin-left: 5px;">Click Here!</a>
				<input type="submit" value="Register">
			</form>
		</div>
	</body>
</html>