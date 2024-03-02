<?php
session_start();
        include("connection/conn.php");

        if($_SERVER['REQUEST_METHOD'] == "POST"){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $sql = "SELECT * FROM user_account";
                $query = mysqli_query($conn,$sql);

                $check = 0;


                while($test = mysqli_fetch_assoc($query)){
                    if($test['username'] == $username){
                        if($test['password'] == $password){
                            $_SESSION['id'] = $test['id'];
                            $check = 1; // This should be $check = 1; for regular users
                        }
                    }else if($username == "admin" || $username == "ADMIN"){
                        if($password == "admin" || $password == "ADMIN"){
                            $check = 2; // This should be $check = 2; for admin
                        }
                    }
                }



                if($check == 2){
                        header('Location: Admin/dashboard.php');
                }else if($check == 1){
                    header('Location: User/dashboard.php');
                }else if($check == 0){
                    echo "
                    <script>
                        alert('No Account found in the Database!');
                    </script>
                     ";
                }
        }

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="index.css">
	</head>
	<body>
		<div class="login">
			<h1>DRRMs Login Portal</h1>
			<form action="index.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required><br>
                <p>You don't have an account? </p><a href = "register.php" style = "text-decoration: none; margin-top: 16px; margin-left: 5px;">Click Here!</a>
				<input type="submit" value="Login">
			</form>
		</div>
	</body>
</html>