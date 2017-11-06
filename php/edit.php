
<?php
require_once('session_verify.php');
require('lists_function.php');
$city_array= array('Mumbai'=>'Mumbai','Chennai'=>'Chennai','Delhi'=>'Delhi','Bangalore'=>'Bangalore','Hyderabad'=>'Hyderabad','Ahmedabad'=>'Ahmedabad','Kolkata'=>'Kolkata','Pune'=>'Pune','California'=>'California','Chicago'=>'Chicago','London'=>'London','Manchester'=>'Manchester');
if(isset($_GET['id']))
{ 
	$users_list= new manage_list();
	$rows=$users_list->display_Old_Data($_GET['id']);
	$imgs='';
	$list_lang=explode(",",$rows['user_lang']);
}
 echo $imgs.="<div id='content'>".     
	 "<img src='".$rows['user_img']."'  height='100' width='100' STYLE='position:absolute; TOP:35px; LEFT:1300px;'>".
     "</div>";
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
    <script src="https://code.jquery.com/jquery-1.12.4.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
    </script>
    <script src="../JS/ajax.js"></script>
</head>
<body>
  <div class="container">
    <h4 align="right" style="color:#069">Welcome <?php echo $user_check; ?></h4>
    <h4 align="right" style="color:#069"><a href="user_lists.php">User Lists</a></h4>
            <form class="form-horizontal" role="forms" method="post">
                <center><h2 >User Update Page</h2></center>

	                <div class="form-group">
	                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
	                    <div class="col-sm-6">
	                        <input type="text" id="firstName" name="update_fnamee"  class="form-control" value="<?php if(isset($_GET['id'])){echo $rows['FirstName'];}  ?>" autofocus>             
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
	                    <div class="col-sm-6">
	                        <input type="text" id="lastName" name="update_lnamee"  class="form-control" value="<?php if(isset($_GET['id'])){echo $rows['LastName'];} else ?>" autofocus>                       
	                    </div>
	                </div>
	                <div class="form-group">
	                	<label for="user_no" class="col-sm-3 control-label"></label>	                    
	                    <div class="col-sm-6">
	                        <input type="hidden" id="user_no" name="user_noo" class="form-control" value="<?php if(isset($_GET['id'])){echo $rows['user_no'];} ?>">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="city" class="col-sm-3 control-label">City</label>
	                    <div class="col-sm-6">
	                        <select name="update_city" value="<?php if(isset($_GET['id'])){echo $rows['user_city'];} ?>" id="city" class="form-control">  
	                            <option style="display:none"><?php if(isset($_GET['id'])){echo $rows['user_city'];}  ?></option>
	                          <?php
	                            foreach($city_array as $key => $value):
	                            echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
	                            endforeach;
	                          ?>
	                        </select>
	                    </div>
	                </div> <!-- /.form-group -->
	                <div class="form-group">
	                    <label for="dob" class="col-sm-3 control-label">Date of Brith</label>
	                    <div class="col-sm-6">
	                        <input type="date" id="dob" name="user_dob" value="<?php if(isset($_GET['id'])){echo $rows['user_dob']; } ?>"  class="form-control" min ="1965-12-31" max="1998-12-31">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="mobile" class="col-sm-3 control-label">Mobile No</label>
	                    <div class="col-sm-6">
	                        <input type="text" id="mobile" name="emp_mo" value="<?php if(isset($_GET['id'])){ echo $rows['user_mobile_no'];} ?>" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="col-sm-3 control-label">Email</label>
	                    <div class="col-sm-6">
	                        <input type="email" id="email" name="user_email" value="<?php if(isset($_GET['id'])) {echo $rows['user_email'];} ?>" class="form-control">
	                    </div>
	                </div>                               
	                <div class="form-group">
	                    <label class="control-label col-sm-3">Gender</label>
	                    <div class="col-sm-6">
	                        <div class="row">
	                            <div class="col-sm-4">
	                                <label class="radio-inline">
	                                    <input <?php if(isset($_GET['id'])){echo ($rows['user_gender']=='Female')?'checked':'';} ?> type="radio" id="femaleRadio" name="update_gender" value="Female">Female
	                                </label>
	                            </div>
	                            <div class="col-sm-4">
	                                <label class="radio-inline">
	                                    <input <?php if(isset($_GET['id'])){echo ($rows['user_gender']=='Male')?'checked':'';}?> type="radio" id="maleRadio" name="update_gender" value="Male" >Male
	                                </label>
	                            </div>
	                        </div>
	                    </div>
	                </div> <!-- /.form-group -->
	                <div class="form-group">
	                    <label class="control-label col-sm-3">Select Language</label>
	                    <div class="col-sm-9">
	                        <div class="checkbox">
	                            <label>
	                                <input <?php if(in_array("English",$list_lang) && isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" id="English" value='English'>English
	                            </label>
	                        </div>
	                        <div class="checkbox">
	                            <label>
	                                <input <?php if(in_array("Hindi",$list_lang)&& isset($_GET['id'])){echo "checked";}?>  type="checkbox" name="language[]" id="Hindi" value='Hindi'>Hindi
	                            </label>
	                        </div>
	                        <div class="checkbox">
	                            <label>
	                                <input <?php if(in_array("Urdu",$list_lang)&& isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" id="Urdu" value='Urdu'>Urdu
	                            </label>
	                        </div>
	                        <div class="checkbox">
	                            <label>
	                                <input <?php if(in_array("Marathi",$list_lang)&& isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" id="Marathi" value='Marathi'>Marathi
	                            </label>
	                        </div>
	                    </div>
	                </div> <!-- /.form-group -->
	                <div class="form-group">
	              
	                    <div class="col-sm-6">
	                        <input type="hidden" id="image" name="user_images" value="<?php echo $rows['user_img']; ?>" class="form-control">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="image" class="col-sm-3 control-label">Select Image</label>
	                    <div class="col-sm-6">
	                        <input type="file" id="image" placeholder="image" name="user_image" onchange="preview_image(event)" class="form-control">
	                        <input type="hidden" id="user_no" name="user_nooo" value="<?php echo $rows['user_no'];  ?>" class="form-control">
	                        <input type="submit" value="Upload Image" name="upload">
	                        <img id="output_image"/>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-sm-6 col-sm-offset-3">
	                        <button  type="submit"  name="submit" id="user_add"  class="btn btn-primary btn-block">Update</button>
	                    </div>
	                </div>

            </form> <!-- /form -->
    </div> <!-- ./container -->
</body>
</html>





<?php
if(isset($_REQUEST['submit']))
{
	$users_list= new manage_list();
	$update_data=$users_list->update($_POST);
	if($update_data)
	{
		echo '
			<div class="alert alert-success">
			  <strong>Success!</strong> The user data is updated.
			</div>
		';		
	}
	else
	{
		$update_data='';	
		echo '
			<div class="alert alert-danger">
			  <strong>Failed!</strong>
			</div>';	
	}
	
}


if(isset($_POST['upload']))
	{
		$users_list= new manage_list();
		$image_update=$users_list->update_img($_POST);
		if($image_update)
		{
			echo "<script type='text/javascript'>alert('The user image is uploaded!')</script>";
		}
		else
		{
			$image_update='';
			echo '
				<div class="alert alert-danger">
				  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
				</div>
			';	
		}
		
	}


?>
