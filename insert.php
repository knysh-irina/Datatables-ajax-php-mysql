<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$statement = $connection->prepare("
			INSERT INTO users (user_name, tel, email, department, login, password ) 
			VALUES (:user_name, :tel, :email, :department, :login, :password )
		");
		$result = $statement->execute(
			array(
				':user_name'	=>	$_POST["user_name"],
				':tel'	=>	$_POST["tel"],
                ':email'	=>	$_POST["email"],
                ':department'	=>	$_POST["department"],
                ':login'	=>	$_POST["login"],
                ':password'	=>	$_POST["password"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$statement = $connection->prepare(
			"UPDATE users 
			SET user_name = :user_name, tel = :tel, email = :email,   department = :department, login = :login, password = :password
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
                ':user_name'	=>	$_POST["user_name"],
                ':tel'	=>	$_POST["tel"],
                ':email'	=>	$_POST["email"],
                ':department'	=>	$_POST["department"],
                ':login'	=>	$_POST["login"],
                ':password'	=>	$_POST["password"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>