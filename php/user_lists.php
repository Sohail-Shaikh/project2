<?php
require_once('session_verify.php');
require_once('lists_function.php');
$users_list= new manage_list();
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$table='manage_list';
	$users_list->delete($id,$table);
}

if(isset($_POST['home']))
{
	header('Location: http://localhost:80/management_list/user_lists.php');
}

if(isset($_POST['add_user']))
{
	header('Location: http://localhost:80/management_list/user_register.php');
}
if(isset($_POST['logout']))
{
	$users_list->logout();
}
?>
<html>
<head>
<title>List of user</title>
<style>
h2 {
	
   position:relative;
	
	top: 203px;
    
}
.but {
	left:1222px;
	position:relative;

}
input[type=submit],input[type=reset],button{
	background-color: #4CAF50;
    color: white;
    
    border: none;
    border-radius: 2px;
    cursor: pointer;
}

</style>
</head>
<body>
<h1> <center>Management List</center></h1>
<form action="" method="POST">
	<h4 align="right" style="color:#069">Welcome <?php echo $user_check; ?></h4>
	<input type="submit" name="list" value='User List'>
	<button class="right" name="home">Home</button><br><br>
	<input type="text" id="searchKey" name="searching" placeholder="Search user" onchange ="search()">
	<div id="output">
	</div>
	<button class="but" name="add_user" value="add_user">Add User</button>
	<button class="but" name="logout" value="Logout">Logout</button>
</form>
<script type="text/javascript" src="ajax.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>

<?php
$users_list= new manage_list();

if(isset($_POST['list']))
{	
	$list=$users_list->user_list();
	if ($list) 
	{
		echo $list;
	}
	else
	{
		echo"errors";
	}
}
else
{
	return false;
}

// if(isset($_POST['search']))
// {	
// 	$search=$_POST['search'];
// 	$lists=$users_list->user_search_list($search);
// 	if ($lists) 
// 	{
// 		echo $lists;
// 	}
// 	else
// 	{
// 		echo"error";
// 	}
// }
// else
// {
// 	return false;
// }

?>



