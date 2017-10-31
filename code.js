
$(document).ready(function () {

    $('#form_page').validate({ // initialize the plugin
        rules: {
            form_page: {
                required: true,
                minlength: 5
            },
            user_lname: {
                required: true,
                minlength: 5
            },
            user_noo: {
                required: true,
                minlength: 5
            }
        }
    });

});


function submitForm(){
  
 var validator = $("#myForm").validate({
   errorClass: "my-error-class",
   validClass: "my-valid-class",
 
  rules: 
  {
                   
   // user_fname: {
   // required: false,
   // minlength: 4,
   // },
   user_lname: {
    required: true,
    //minlenght: 3
    
   },
   user_noo: {
    required: true,
    //minlenght: 4,
  },
   city: {
    required: true,
  },
   user_dob: {
    required:true,
  },
   user_mob: {
    required: true,
    //minlenght: 13,
  },
   user_email:
    {
    required: true,
    email: true,
   },
   language: {
    required: true,
   },
   user_image:{
    required: true,
   },
},  

     
                                   
     messages: {
     //user_fname: " Please enter first name",
     user_lname: " Please enter last name",
     user_noo: " Please enter user no",
     city: " please enter city",
     user_dob: " Please enter Date of Birth",
     user_mob: " Please enter mobile no",
     user_email: " Please enter email",
     language:" Please select aleast one language",
     user_image: " Please select the image",
     },

    
 });

//  if(validator.form()){ // validation perform
   
//   $('form#myForm').submit();
//  }
// }

// jQuery(document).ready(function() {
//   jQuery("#myForm").submit(function(event) {
//     form = $(this).serialize();
//     $(this).validate();
//     if (!$(this).valid()) return false;
//     $.ajax({
//       type: 'post',
//       url: 'create_html.php',
//       data: form,
//       dataType: 'html',
//       success: function(data) {
//         $("#fname").val('user_fname');
//         $("#lname").val('user_lname');
//         $("#user_no").val('user_noo');
//         $("#user_city").val('city');
//         $("#user_dob").val('user_dob');
//         $("#user_mobile").val('user_mob');
//         $("#user_email").val('user_email');
//         $("#user_img").val('user_image');
        
//         $("#contactsuccess").html(data);
//       }
//     });
//     event.preventDefault();

//   });
// });

// $(document).ready(function() {

    

//     $('#myForm').on('submit', function(e) {
//         e.preventDefault();

//         $.ajax({
//             dataType: 'json',
//             type: 'POST',
//             url: 'testt.php',
//             data: $('#myForm').serialize(),
//             beforeSubmit: submitForm,
//             success: function(data) {
//                 console.log(data);
              
//                 // $('#submits').remove();
//                 // $('#contactsuccess').fadeIn(1000);
//                 // $('#contactsuccess').html(responseData);
//             },
//             error: function(data){
//                 console.log('Ajax request not recieved!');
//             }
//         });

//         // resets fields
//         $('input#fname').val("");
//         $('input#lname').val("");
//         $('input#user_no').val("");
//         $('input#user_city').val("");
//         $('input#user_dob').val("");
//         $('input#user_mobile').val("");
//         $('input#user_email').val("");
//         $('input#user_img').val("")

        
//     })
// });