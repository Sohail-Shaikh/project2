<?php
require_once('session_verify.php');
$city_array= array('Mumbai'=>'Mumbai','Chennai'=>'Chennai','Delhi'=>'Delhi','Bangalore'=>'Bangalore','Hyderabad'=>'Hyderabad','Ahmedabad'=>'Ahmedabad','Kolkata'=>'Kolkata','Pune'=>'Pune','California'=>'California','Chicago'=>'Chicago','London'=>'London','Manchester'=>'Manchester');
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Register Form</title>
        <link rel="stylesheet" href="create_style.css">
    </head>
    <body>
      <h4 align="right" style="color:#069">Welcome <?php echo $user_check; ?></h4>
      <h4 align="right" style="color:#069"><a href="user_lists.php">User Lists</a></h4>
      <center><h2>User Page</h2></center>
      <div class="container" align="center" id='contactsuccess'>
        
        <form action="#" id="my_form_id" method='POST' >            
                <div> <label >User FirstName:</label><input type="text"  name="user_fname" placeholder="User FirstName" id="fname" ><br><br></div>
                <div> <label >User LastName:</label><input type="text"  name="user_lname" placeholder="User LastName"  id="lname"><br><br></div>
                <div><label >User No:</label><input type="number"  name="user_noo" placeholder="User Number" id="user_no" ><br><br></div>    
                <div><label>City:</label>
                 <select class="country" name="city" value="<?php echo $user_city;  ?>" id="user_city">
                      <option value="">-----------------</option>
                          <?php
                          foreach($city_array as $key => $value):
                          echo '<option value="'.$key.'">'.$value.'</option>'; //close your tags!!
                          endforeach;
                          ?>          
                </select><br><br></div>
                <div> <label >User DOB:<input type="date"  name="user_dob" min ="1965-12-31" max="1998-12-31" placeholder="mm/dd/yyyy" id="user_dob"><br><br></label></div>
                <div><label >User Mobile No:<input type="text"  name="user_mob" maxlength="13"  pattern="[0-9,+]{13}" placeholder="User Mobile" id="user_mobile"><br><br></label></div>
                <div><label >User Email:<input type="email"  name="user_email" placeholder="User Email" id="user_email"><br><br></label></div>
                <div ><label >Select Gender:
                <input type="radio" name="gender" value="Male" checked id='gender'> Male
                
                <input type="radio" name="gender" value="Female" id='gender'> Female<br><br></label>
                <div ><label class="l1"  >Select Language:</label><br>
               <input class="l2" type="checkbox" name="language[]" value="English" id="lang"> English
               <input  class="l3" type="checkbox" name="language[]" value="Hindi" id="lang"> Hindi
               <input  class="l4" type="checkbox" name="language[]" value="Urdu" id="lang"> Urdu
               <input  class="l5" type="checkbox" name="language[]" value="Marathi" id="lang"> Marathi<br><br></div>
               <lable> Select image to upload:
                <div id="wrapper">
                <input  type="file"  name="images"  onchange="preview_image(event)" id="user_img"></label>
                <img id="output_image"/><br><br>
              </div>
            <input type="submit" name="submit-form" onclick ="submitForm()" id="user_add" value="submit" />
            <form/>
      </div>
      <div id="error_container"></div>       
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="ajax.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    </body>
</html>

<?php
if(isset($_POST['list_page']))
{
  header('Location: user_lists.php');
}
?>