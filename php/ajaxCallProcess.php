<?php

require_once('session_verify.php');
require_once('lists_function.php');
if(isset($_POST['submit-form']))
{
	$users_list= new manage_list();	
	$results= $users_list->create($_POST,$_FILES['images']['name']);
	if($results)
	{
		echo "alert('Your Data is submitted successfully!')";
	}
	else
	{
		echo "alert('Failed!')";    
	} 
}

if(isset($_POST['searching']))
{
	$users_list= new manage_list();
	$results= $users_list->user_search_list($_POST['searching']);
	if($results)
	{
		echo $results;
	}
	else
	{
		echo "<script type='text/javascript'>alert('Failed!')</script>";    
	} 
}
else
{
	return false;
}

?>