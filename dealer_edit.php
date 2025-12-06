<?php
require 'db.php';

if(isset($_GET['id']))
{
	$id = $_GET['id'];

	$sql = "select * from dealers where id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0)
	{
		$data = $result->fetch_assoc();
	}
	else
	{
		$data = [];
	}
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$updated_by = 1;
	$updated_date = $date;

	$sql = "update dealers set name = ?, email = ?, updated_by = ?, updated_date = ? where id = ?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("ssssi", $name, $email, $updated_by, $updated_date, $id);

	if($stmt->execute())
	{
		header('Location:http://localhost/core_php_github_proj1/dealer_show.php');
	}
	else
	{
		echo "Error Updating data :" . $conn->error;
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dealer Edit</title>
</head>
<body>
<h2>Dealer Edit Form</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<label>Name : </label>
	<input type="text" name="name" placeholder="Enter Name" value="<?php echo $data['name']; ?>">
	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	<br><br>
	<label>Email : </label>
	<input type="text" name="email" placeholder="Enter Email" value="<?php echo $data['email']; ?>">
	<br><br>
	<input type="submit" name="submit">
</form>
</body>
</html>