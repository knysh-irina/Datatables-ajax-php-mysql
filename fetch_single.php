<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM users 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["user_name"] = $row["user_name"];
		$output["tel"] = $row["tel"];
        $output["email"] = $row["email"];
        $output["department"] = $row["department"];
        $output["login"] = $row["login"];
        $output["password"] = $row["password"];

	}
	echo json_encode($output);
}
?>