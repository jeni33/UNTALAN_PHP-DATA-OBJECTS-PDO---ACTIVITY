<?php require_once 'core/dbconfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>	
	<style>
		table, th, td{
			border:1px solid black;
		}	
	</style>
</head>
<body>
	
	<?php
	$stmt = $pdo->prepare("SELECT * FROM customers");

	if ($stmt->execute()) {
		echo "<pre>";
        print_r($stmt->fetchAll());
		echo "<pre>";
	}

	$stmt = $pdo->prepare("SELECT * FROM menuitems 
	WHERE  menu_item_id = 1");

	if ($stmt->execute()) {
		echo "<pre>";
        print_r($stmt->fetch());
		echo "<pre>";
	}

$query = "INSERT INTO reservations (reservation_id, 
	customer_id, table_id, reservation_time, party_size) 
	VALUES (?, ?, ?, ?, ?)";

	$stmt = $pdo->prepare($query);

	$executeQuery = $stmt->execute(
		[28, 4, 4, '2/26/2000 17:02:24', 38]
	);
	
	if ($executeQuery) {
		echo "Query succesful!";
	}
	else {
		echo "Query failed";
	}

	$query = "DELETE FROM menuitems 
	WHERE  menu_item_id = 1";

	$stmt = $pdo->prepare($query);

	$executeQuery = $stmt->execute();
	
	if ($executeQuery) {
		echo "Deletion succesful!";
	}
	
$query = "SELECT * FROM customers";

$stmt = $pdo->prepare($query);
	 $executeQuery = $stmt->execute();
	 
	 if ($executeQuery) {
	 $customers = $stmt->fetchAll();
	}
 	 else {
 		echo "Query failed";
 	}
	?>
	<table>
		<tr>
			<th>Customer id</th>
			<th>Name</th>
			<th>Phone Number</th>
			<th>Email</th>
		</tr>

	<?php foreach ($customers as $row) { ?>
		<tr>
			<td><?php echo $row['customer_id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['phone_number']; ?></td>
			<td><?php echo $row['email']; ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>