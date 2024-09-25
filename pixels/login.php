<?php
require("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.login-container {
			width: 300px;
			margin: 50px auto;
			background-color: #fff;
			padding: 20px;
			border: 1px solid #ddd;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		.login-header {
			text-align: center;
			margin-bottom: 20px;
		}
		.login-form {
			margin-top: 20px;
		}
		.login-form input[type="text"], .login-form input[type="password"] {
			width: 100%;
			height: 40px;
			margin-bottom: 20px;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		.login-form button[type="submit"] {
			width: 100%;
			height: 40px;
			background-color: #4CAF50;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			font-size: 16px;
			font-weight: bold;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}
		.login-form button[type="submit"]:hover {
			background-color: #3e8e41;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
		}
	</style>
</head>
<body>
<div class="login-container">
    <div class="login-header">
        <h2>Admin Login</h2>
    </div>
    <form class="login-form" action="login.php" method="post">
        <input type="text" name="adminname" placeholder="Username">
        <input type="password" name="adminpassword" placeholder="Password">
        <button type="submit" name="Login">Login</button>
    </form>
</div>
	<?php
session_start(); 
if (isset($_POST['Login'])) {
    $adminname = $_POST['adminname'];
    $adminpassword = $_POST['adminpassword'];

    $stmt = $conn->prepare("SELECT * FROM `admin-login` WHERE `adminname` = ? AND `adminpassword` = ?");
    $stmt->bind_param("ss", $adminname, $adminpassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['adminloginid'] = $adminname;
        header("Location: adminpanel.php");
        exit(); 
    } else {
        echo "<script>alert('Incorrect username or password');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>