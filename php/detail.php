
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="detail_style.css">
</head>
<body>
<form method="GET">
<input type="submit" value="back" name="backs">


</form>
</body>
</html>



<?php
require_once('session_verify.php');
require('lists_function.php');

	if(isset($detail))
	{
		$detail='';
	}

	if(isset($_REQUEST['backs']))
	{
		header('Location: http://localhost:80/management_list/user_lists.php');
	}

	if(isset($_GET['id']))
	{
		$users_list= new manage_list();
		$id=$_GET['id'];
		$table='manage_list';
		$users_list->detail($id,$table);
	}
?>