<?php
require 'db.php';


if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	
	$sql = "insert into dealers(name,email,is_active,created_by,created_date) values ('$name','$email',1,1,now())";
	if($conn->query($sql) === true)
	{
		header('Location:http://localhost/core_php_github_proj1/dealer_show.php');
	} 
	else
	{
		echo"Insertion Fail";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create Dealer</title>
	<link rel="stylesheet" type="text/css" href="dealer_show_css.css">
</head>
<body>
<header>
	<h2>Create Dealer</h2>
</header>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<label>Name : </label>
	<input type="text" name="name" placeholder="Enter Name">
	<br><br>
	<label>Email : </label>
	<input type="text" name="email" placeholder="Enter Email">
	<br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>