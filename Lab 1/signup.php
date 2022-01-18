<?php
	session_start();
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//$_POST is used to collect the value of the input field from the form data
		//$_POST['variable'] - variable here refers to the name 

		$firstname = $_POST['fname']; 
		$lastname = $_POST['lname'];
		$email = $_POST['address'];
		$password = $_POST['pass'];

		//checks if password has a match 
		$uppercase = preg_match('@[A-Z]@', $password); 
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChar = preg_match('@[^\w]@', $password);


		//gets the user from the database with the same email
		$query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'"); 


		//if there is an existing email in the database
		if(mysqli_num_rows($query)>0){
			echo '<script>alert("Email already exists")</script>';
		}
		//checks if the password does not have the condition
		elseif(strlen($password) < 8 || !$uppercase || !$lowercase || !$number || !$specialChar){
			echo '<script>alert("Password must consists of at least 8 characters in length, 1 capital letter, 1 number, and 1 symbol/special character.")</script>';
		}
		else{
			//saves into database
			$sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password');";
			mysqli_query($conn, $sql);
			header("Location: login.php");
			die;
		}

		
	}

?>

<!DOCTYPE html>

<head>
	<link rel="stylesheet" type="text/css" href="main.css"/> 
<head>
<head> 
	<title>Signup Page</title>
</head>
<body>
	<div class="signup">
	<form id= "signup" method="post" action="#">
		<h2 style= "border-bottom-style: groove;">SIGN UP</h2>
		<label><b>First Name:
		</b>
		</label>	
		<input type="text" name="fname" id="firstName" placeholder="First Name">
		<br><br>
		<label><b>Last Name:
		</b>
		</label>
		<input type="text" name="lname" id="lastName" placeholder="Last Name">
		<br><br>
		<label><b>Email Address:
		</b>
		</label>
		<input type="text" name="address" id="address" placeholder="Email">
		<br><br>
		<label><b>Password:
		</b>
		</label>
		<input type="Password" name="pass" id="pass" placeholder="Password">
		<input type= "checkbox" onclick= togglePass()><label>Show Password<label>   

		<br><br>
		<div style= "text-align: center;">
			<input type="submit" name= "sign" id="sign" value="SIGN UP">
		</div>
		<br>
		<p style= "border-bottom-style: groove; margin-top: 0px;"></p>
		<span>Already have an account?</span>
		<input type="button" onclick="location.href = 'login.php'" name="log" id= "log" value="LOGIN">
	</form>
	</div>
	<script>
		function togglePass(){
			var password = document.getElementById("pass"); //gets the value of id "pass"
			if (password.type == "password"){		
				password.type = "text";
			}else{
				password.type = "password";
			}
		}
	</script>

</body>
</html>
