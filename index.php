<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách tác giả</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f9;
			color: #333;
			text-align: center;
		}

		table {
			width: 50%;
			margin: 20px auto;
			border-collapse: collapse;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			background-color: #fff;
		}

		table,
		th,
		td {
			border: 1px solid #ddd;
			padding: 10px;
		}

		th {
			background-color: #4CAF50;
			color: white;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
	</style>
</head>

<body>

	<h1>Danh sách Tác Giả</h1>

	<form action="function1.php" method="POST">
		<label for="id">ID</label>
		<input id="id" name="id" type="text" placeholder="ex: 1">
		<label for="ten">Tên</label>
		<input id="ten" name="ten" type="text" placeholder="ex: Nguyễn Văn A">
		<label for="tuoi">Tuổi</label>
		<input id="tuoi" name="tuoi" type="text" placeholder="ex: 20">
		<label for="quequan">Quê quán</label>
		<input id="quequan" name="quequan" type="text" placeholder="ex: Hải Phòng">
		<button type="submit">Thêm</button>
	</form>

	<?php
	include("function1.php");
	?>
	

</body>

</html>