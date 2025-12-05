<?php
require 'db.php';

$sql = "select * from dealers where is_active = 1";
$result = $conn->query($sql); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dealers</title>
	<link rel="stylesheet" type="text/css" href="dealer_show_css.css">
</head>
<body>
<header>
	<h2>Dealers View</h2>
</header>
<a href="dealer_create.php"><button>Add Dealer</button></a>
<table id="tb1"; border="1" >
	<tr>
		<th>Sno</th>
		<th>Name</th>
		<th>Email</th>
		<th>Status</th>
		<th>Created</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php $i=1; while($row = $result->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php if($row['is_active'] == 1){ echo "Active"; } ?></td>
			<td><?php echo $created_dt = date('Y-m-d', strtotime($row['created_date'])); ?></td>
			<td><button>Edit</button></td>
			<td><button>Delete</button></td>
		</tr>
	<?php $i++; } ?>
</table>
</body>
</html>