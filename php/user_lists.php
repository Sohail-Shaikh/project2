
<?php
require_once('session_verify.php');
require_once('lists_function.php');
$users_list= new manage_list();
if(isset($_GET['logout']))
{
	$users_list->logout();
}

if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$table='manage_list';
	$users_list->delete($id,$table);
}


?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
	<script src="../JS/ajax.js"></script>
	 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		</head>
			<body>          
                <center><h2 >Management List</h2></center>
                <h4 align="right" style="color:#069"> Welcome <?php echo $user_check; ?></h4>
                <nav class="navbar navbar-inverse">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>                        
				      </button>
				      <a class="navbar-brand" href="#">Logo</a>
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="user_lists.php">Home</a></li>
				        <li><a href="?list=true">User List</a></li>
				        <li><a href="user_register.php">Add User</a></li>				       
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="?logout=true""><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				      </ul>
				      	<form class="navbar-form" role="search" method="post">
							<div class="input-group">
								<input type="text" name="searching" id="searchKey" placeholder="Search user"  class="form-control pull-right" style="width: 300px; margin-right: 35px, border: 1px solid black; background-color: #e5e5e5;" placeholder="Search">
								<span class="input-group-btn">
									<button type="submit"  class="btn btn-default" onclick="search()">
										
										<span class="glyphicon glyphicon-search">
											<span class="sr-only">Search</span>
										</span>
									</button>
								</span>
							</div>	
						</form>
				    </div>
				  </div>
				</nav>
				<div class="container">	
					 <div class="form-group">
	                    <div id="search_output" class="col-sm-6">
	                        
	                        
	                    </div>
	                </div>											
				</div>
			</body>
</html>
<?php
$users_list= new manage_list();


if(isset($_GET['list']))
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


?>


