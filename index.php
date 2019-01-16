<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</head>
<body>
<form  style="margin:10% 35% 15% 35%" align="center" method="POST" action="check.php">
	<h1>LOGIN PAGE</h1>
	<a href="medicine.php">MEDICINE</a>
	<label>UserName</label><br>
	<input type="text" class="form-control" name="username" placeholder="Enter your Email to Log In"> <span id="txt" ></span> <br>
	<label>Password</label><br>
	<input type="password" class="form-control" name="password"><br>
	<input type="submit" class="btn btn-success" name="Submit">
</form>
</body>
</html>