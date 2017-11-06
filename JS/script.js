// function ValidateEmail(email) 
// {
//         var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
//         return expr.test(email);
// };

function mouseoverPass(obj) {
  var obj = document.getElementById('passcode');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('passcode');
  obj.type = "password";
}

function togglePassword(el){
 
  // Checked State
  var checked = el.checked;

  if(checked){
   // Changing type attribute
   document.getElementById("passcode").type = 'text';

   // Change the Text
   document.getElementById("toggleText").textContent= "Hide";
  }else{
   // Changing type attribute
   document.getElementById("passcode").type = 'password';

   // Change the Text
   document.getElementById("toggleText").textContent= "Show";
  }

 }
    $(document).ready(function(){
    
    $('input[type=password]').keyup(function() {
        var pswd = $(this).val();
        
        //validate the length
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }
        
        //validate letter
        if ( pswd.match(/[A-z]/) ) {
            $('#letter').removeClass('invalid').addClass('valid');
        } else {
            $('#letter').removeClass('valid').addClass('invalid');
        }

        //validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

        //validate number
        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }
        
        //validate space
        if ( pswd.match(/[^a-zA-Z0-9\-\/]/) ) {
            $('#space').removeClass('invalid').addClass('valid');
        } else {
            $('#space').removeClass('valid').addClass('invalid');
        }
        
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

    // $("#submit_login").live("click", function () {
    //     if (!ValidateEmail($("#emails").val())) {
    //         alert("Invalid email address.");       
    //     }
    //     else{
    //         //alert("Valid email address.");
    //     }
    // });
    
});


function submitLogin(){
  
 var validator = $("#login_form").validate({
   errorClass: "my-error-class",
   validClass: "my-valid-class",
  rules: 
  {                
     emails:
    {
    required: true,
    email: true,
   },

    passwords:
    {
      required:true,
    },
      
},                                
     messages: {
      emails: {
      required: "Enter your Email",
      email: "Please enter a valid email address.",
     },

     passwords:{
      required: " Please enter a valid password.",
     }

     },
 });
}