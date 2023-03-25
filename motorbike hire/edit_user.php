<!DOCTYPE html>
<html>
<head>
	<title>Motorbike Hire Management - Users</title>
</head>
<body>
	<h1>Users</h1>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Connect to the database
				$conn = mysqli_connect('localhost', 'root', '', 'motorbike_management');
				if (!$conn) {
				    die('Could not connect: ' . mysqli_connect_error());
				}

				// Retrieve the user data from the database
				$sql = "SELECT * FROM users";
				$result = mysqli_query($conn, $sql);

				// Loop through the user data and display it in the HTML table
				while ($row = mysqli_fetch_assoc($result)) {
				    echo "<tr>";
				    echo "<td>" . $row['id'] . "</td>";
				    echo "<td>" . $row['name'] . "</td>";
				    echo "<td>" . $row['email'] . "</td>";
				    echo "<td>" . $row['role'] . "</td>";
				    echo "<td><a href='edit_user.php?id=" . $row['id'] . "'>Edit</a></td>";
				    echo "</tr>";
				}

				// Close the database connection
				mysqli_close($conn);
			?>
		</tbody>
	</table>
</body>
</html>
