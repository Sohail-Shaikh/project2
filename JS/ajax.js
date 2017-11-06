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


function submitForm(){
  
 var validator = $("#my_form_id").validate({
   errorClass: "my-error-class",
   validClass: "my-valid-class",
  rules: 
  {                
      user_fname: {
   required: true,
   },
      user_lname: {
    required: true,
   },
      user_noo: {
    required: true,
  },
      city: {
    required: true,
  },
      user_dob: {
    required:true,
  },
      user_mob: {
    required: true,
  },
      user_email:
    {
    required: true,
    email: true,
   },
      'language[]': {
    required: true,
   },
      images:{
    required: true,
   },
},                                
     messages: {
     user_fname: " Please enter first name",
     user_lname: " Please enter last name",
     user_noo: " Please enter user no",
     city: " please enter city",
     user_dob: " Please enter Date of Birth",
     user_mob: " Please enter mobile no",
     user_email: {
      required: "Enter your Email",
      email: "Please enter a valid email address.",
     },
     'language[]':" <br>Please select aleast one language<br>",
     images: " Please select the image",
     },


    submitHandler: function(form) 
    {
      
   
    var form_data = new FormData($('form')[0]);
    $.ajax({
      type: "POST",
      url: 'ajaxCallProcess.php',
      data: form_data,
      processData: false,
      contentType: false,
            success: function (data) {
              alert('The User is Registered');
              //console.log(data);
            },
            error: function (data) {
                console.log('An error occurred.');
                console.log(data);
            },
      });

    }
 });
}

function editForm(){
  
 var validation = $("#edit_form").validate({
   errorClass: "my-error-class",
   validClass: "my-valid-class",
  rules: 
  {                
      update_fnamee: {
   required: true,
   },
      update_lnamee: {
    required: true,
   },
      update_city: {
    required: true,
  },
      user_dob: {
    required:true,
  },
      emp_mo: {
    required: true,
  },
      user_email:
    {
    required: true,
    email: true,
   },
      'language[]': {
    required: true,
   },
},                                
     messages: {
     update_fnamee: " Please enter first name",
     update_lnamee: " Please enter last name",
     update_city: " please enter city",
     user_dob: " Please enter Date of Birth",
     emp_mo: " Please enter mobile no",
     user_email: {
      required: "Enter your Email",
      email: "Please enter a valid email address.",
     },
     'language[]':" <br>Please select aleast one language<br>",
     },

});
}


function search() 
{
  var query_value = $('#searchKey').val();
  if(query_value !== '')
  {
  $.ajax({
  type: "POST",
  url: "ajaxCallProcess.php",
  data: { searching: query_value },
  cache: false,
  dataType: 'html',
  success: function(data)
    {
     $("#search_output").html(data).show();
       //alert(data);
       console.log(data);    
     }
  });
  }
return false;
}