<?php

	$host 	= 'localhost';
	$db 		= 'shuabe_test';
	$user 	= 'shuabe';
	$pass 	= 'watonklakon1';

if (isset($_POST['submit'])) {
	$newUser = $_POST['name'];
	try {
	  $dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
	  $query = " INSERT INTO contact VALUES(null, '".$newUser."', '".$newUser."@horestco.com') ";
	  $count = $dbh->exec($query);
	  echo $count;
		$dbh = null;
	} catch (PDOException $e) {
		echo "Error ". $e->getMessage();
	};
};

	  $dbh = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);

	  $query = " SELECT * FROM contact ";
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<h1>Contact Users</h1>
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						foreach ($dbh->query($query) as $row):
					 ?>
					<tr>
						<td><?=$i?></td>
						<td><?=$row[1]?></td>
						<td><?=$row[2]?></td>
					</tr>
					<?php
						$i++;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</body>
</html>