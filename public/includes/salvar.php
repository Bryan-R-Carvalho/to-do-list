<?php
	include "../config.php";
	$task = $_POST['task'];
	$description = $_POST['description'];
	$date = $_POST['date'];
	$completed = isset($_POST['completed']) ? 1 : 0;
	mysqli_query($link, "INSERT INTO tasks (task, description, date, completed) 
	VALUES ('$task', '$description', '$date', '$completed')") or die(mysqli_error($link));
	header("Location: ../index.php");

