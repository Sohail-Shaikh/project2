<?php
require_once('session_verify.php');
require('lists_function.php');
$city_array= array('Mumbai'=>'Mumbai','Chennai'=>'Chennai','Delhi'=>'Delhi','Bangalore'=>'Bangalore','Hyderabad'=>'Hyderabad','Ahmedabad'=>'Ahmedabad','Kolkata'=>'Kolkata','Pune'=>'Pune','California'=>'California','Chicago'=>'Chicago','London'=>'London','Manchester'=>'Manchester');
if(isset($_GET['id']))
{ 
	$users_list= new manage_list();
	$rows=$users_list->display_Old_Data($_GET['id']);
	$imgs='';
}
 $list_lang=explode(",",$rows['user_lang']);
	 echo $imgs.="<table>".
     "<tr>".
	 "<td>"."<img src='".$rows['user_img']."'  height='100' width='100' STYLE='position:absolute; TOP:35px; LEFT:1300px;'>"."</td>".
     "</tr>";
?>

 <html>
<head>
<style>
</style>
<link rel="stylesheet" href="edit_style.css">
<script type='text/javascript'>
function preview_image(event) 
{
	 var reader = new FileReader();
	 reader.onload = function()
	 {
	  var output = document.getElementById('output_image');
	  output.src = reader.result;
	 }
	 reader.readAsDataURL(event.target.files[0]);
}
</script>
</head>
<body>
<center><h2>User Create Page</h2></center>
<div class="container" align="center">
  <form action="edit.php" method="POST" id="edit_form">
     <label >User FirstName:</label><input type="text" name="update_fnamee" value="<?php if(isset($_GET['id'])){echo $rows['FirstName'];}  ?>"/><br><br>
		<label >User LastName:</label><input type="text" name="update_lnamee" value="<?php if(isset($_GET['id'])){echo $rows['LastName'];} else ?>"/><br><br>
		<label ></label><input type="hidden"  name="user_noo" value="<?php if(isset($_GET['id'])){echo $rows['user_no'];} ?>" ">
		<label >User city:</label>
		    <select class="country" name="update_city" value="<?php if(isset($_GET['id'])){echo $rows['user_city'];} ?>" ><br><br><br><br>
				<option style="display:none"><?php if(isset($_GET['id'])){echo $rows['user_city'];}  ?></option>
				
                    <?php
                          foreach($city_array as $key => $value):
                          echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
                          endforeach;
                          ?>  
			</select><br><br>
		<br><label >User Mobile No:</label><input type="text" name="emp_mo" value="<?php if(isset($_GET['id'])){ echo $rows['user_mobile_no'];} ?>"/><br><br><br>
		<label >User Email:</label><input type="email"  name="user_email" value="<?php if(isset($_GET['id'])) {echo $rows['user_email'];} ?>"/><br><br>
		<label >User DOB:</label><input type="date"  name="user_dob" min ="1965-12-31" max="1998-12-31" value="<?php if(isset($_GET['id'])){echo $rows['user_dob']; } ?>"><br><br>
		<label >Select Language:</label>
	 <input <?php if(in_array("English",$list_lang) && isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" value="English" > English
	 <input class='lang1' <?php if(in_array("Hindi",$list_lang)&& isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" value="Hindi"> Hindi
	 <input class='lang2' <?php if(in_array("Urdu",$list_lang)&& isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" value="Urdu" > Urdu	 
	 <input class='lang3' <?php if(in_array("Marathi",$list_lang)&& isset($_GET['id'])){echo "checked";}?> type="checkbox" name="language[]" value="Marathi"> Marathi<br><br>
		 <label >Select Gender:</label>
		<input <?php if(isset($_GET['id'])){echo ($rows['user_gender']=='Male')?'checked':'';}?>   type="radio" name="update_gender" value="Male" > Male	
		<input <?php if(isset($_GET['id'])){echo ($rows['user_gender']=='Female')?'checked':'';} ?>  type="radio" name="update_gender" value="Female"> Female<br><br>
	 <input type="hidden" type="file" name="user_images" accept="image/*"  value="<?php echo $rows['user_img']; ?>" onchange="preview_image(event)" ><br><br>
	 <!-- <input type="file" name="user_image" accept="image/*"  onchange="preview_image(event)" ><br><br> -->
	 Select image to upload:
	  <div id="wrapper">
		<input type="file" name="user_image" accept="image/*" onchange="preview_image(event)" >
		<label ></label><input type="hidden"  name="user_nooo" value="<?php echo $rows['user_no'];  ?>" "> 
		<input type="submit" value="Upload Image" name="upload"> 
		<img id="output_image"/><br><br>

	</div>
     <input type="submit" value="Submit" name="submit" onclick="editForm()">
	 <input  type="submit" name="list_page" value="User lists">
  </form>
</div>
 
</form>
</form>
<script type="text/javascript" src="ajax.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['list_page']))
{
	header('Location: http://localhost:80/management_list/user_lists.php');
}

if(isset($_REQUEST['submit']))
{
	$users_list= new manage_list();
	$update_data=$users_list->update($_POST);
	if($update_data)
	{
		header('Location: http://localhost:80/management_list/user_lists.php');		
	}
	else
	{
		$update_data='';	
		echo "<script type='text/javascript'>alert('Failed!')</script>";	
	}
	
}

if(isset($_POST['upload']))
	{
		$users_list= new manage_list();
		$image_update=$users_list->update_img($_POST);
		if($image_update)
		{
			header('Location: http://localhost:80/management_list/user_lists.php');
		}
		else
		{
			$image_update='';
			echo "<script type='text/javascript'>alert('Failed!')</script>";	
		}
		
	}


?>