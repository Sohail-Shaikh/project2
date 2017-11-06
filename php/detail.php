<?php
require_once('session_verify.php');
require('lists_function.php');

	if(isset($detail))
	{
		$detail='';
	}

	if(isset($_REQUEST['backs']))
	{
		header('Location: http://localhost:80/management_list/php/user_lists.php');
	}

	if(isset($_GET['id']))
	{
		$users_list= new manage_list();
		$id=$_GET['id'];
		$table='manage_list';
		$users_list->detail($id,$table);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
	<link rel="stylesheet" href="../CSS/detail_style.css">
</head>
<body>
	<div class="container">
		<form method="GET">
			<div class="form-group">
	            <div class="col-sm-3 col-sm-offset-3">
	                <button  type="submit"  name="backs" value="back" class="btn btn-primary btn-lg pull-right">Back</button>
	            </div>
	        </div>
	    </form>
	</div>
</body>
</html>


