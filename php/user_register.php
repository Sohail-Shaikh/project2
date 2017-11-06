<?php
require_once('session_verify.php');
$city_array= array('Mumbai'=>'Mumbai','Chennai'=>'Chennai','Delhi'=>'Delhi','Bangalore'=>'Bangalore','Hyderabad'=>'Hyderabad','Ahmedabad'=>'Ahmedabad','Kolkata'=>'Kolkata','Pune'=>'Pune','California'=>'California','Chicago'=>'Chicago','London'=>'London','Manchester'=>'Manchester');
?>

<!DOCTYPE html>
<html>
<head>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"></link>
    <script src="https://code.jquery.com/jquery-1.12.4.js">
    </script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
    </script> -->
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js">
    </script>
  <script src="../JS/ajax.js"></script>
  <script type="text/javascript">
  </script>
</head>
<body>
  <div class="container">
    <h4 align="right" style="color:#069">Welcome <?php echo $user_check; ?></h4>
        <h4 align="right" style="color:#069"><a href="user_lists.php">User Lists</a></h4>
            <form class="form-horizontal" id="my_form_id" role="form" method="post">
                <center><h2 >Add User</h2></center>
                <div class="form-group">
                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                    <div class="col-sm-6">
                        <input type="text" id="firstName" name="user_fname" placeholder="First Name" class="form-control" autofocus>
                        <!-- <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                    <div class="col-sm-6">
                        <input type="text" id="lastName" name="user_lname" placeholder="Last Name" class="form-control" autofocus>
                        <!-- <span class="help-block">Last Name, First Name, eg.: Smith, Harry</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_no" class="col-sm-3 control-label">User No</label>
                    <div class="col-sm-6">
                        <input type="number" id="user_no" name="user_noo" placeholder="user no" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-3 control-label">City</label>
                    <div class="col-sm-6">
                        <select name="city" value="<?php echo $user_city;  ?>" id="city" class="form-control">  
                            <option value="">-----------------</option>
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
                        <input type="date" id="dob" name="user_dob" placeholder="Brith Date" class="form-control" min ="1965-12-31" max="1998-12-31">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mobile" class="col-sm-3 control-label">Mobile No</label>
                    <div class="col-sm-6">
                        <input type="text" id="mobile" name="user_mob" placeholder="Mobile No" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" id="email" name="user_email" placeholder="Email" class="form-control">
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="control-label col-sm-3">Gender</label>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="femaleRadio" name="gender" value="Female">Female
                                </label>
                            </div>
                            <div class="col-sm-4">
                                <label class="radio-inline">
                                    <input type="radio" id="maleRadio" name="gender" value="Male" checked >Male
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
                                <input type="checkbox" name="language[]" id="English" value='English'>English
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="language[]" id="Hindi" value='Hindi'>Hindi
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="language[]" id="Urdu" value='Urdu'>Urdu
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="language[]" id="Marathi" value='Marathi'>Marathi
                            </label>
                        </div>
                    </div>
                </div> <!-- /.form-group -->
                <div class="form-group">
                    <label for="image" class="col-sm-3 control-label">Select Image</label>
                    <div class="col-sm-6">
                        <input type="file" id="image" placeholder="image" name="images" onchange="preview_image(event)" class="form-control">
                        <img id="output_image"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6 col-sm-offset-3">
                        <button  type="submit"  name="submit-form" id="user_add"  onclick="submitForm()" class="btn btn-primary btn-block">Register</button>
                    </div>
                </div>
            </form> <!-- /form -->
        </div> <!-- ./container -->
</body>
</html>


<?php
if(isset($_POST['list_page']))
{
  header('Location: user_lists.php');
}
?>