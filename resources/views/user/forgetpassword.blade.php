<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.css">
<script type="text/javascript" src="https://cdn.rawgit.com/t4t5/sweetalert/v0.2.0/lib/sweet-alert.min.js"></script>

<?php
  $email = base64_decode($email);
  $customerID = $userID;
?>

<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{env('APP_url') }}/public/css/forgetpassword.css">


<main class="bd">
  <div class="container" id="changepassdiv" >
    <form method="post"  id="resetpasswordForm">
      <input type="hidden" name="email" value="{{ $email }}">
      <input type="hidden" name="userID" value="{{ $customerID }}">
      <h2>Change Password</h2>
      <div class="form-group formContainer">
        <label for="txtPassword1">Enter Password</label>
        <input type="password" id="txtPassword" class="form-control" name="password" maxlength="15"  required >
        <i id="pass-status" class="fa fa-eye-slash" aria-hidden="true" ></i>
      </div>
      <div class="form-group formContainer1">
        <label for="txtPassword1">Confirm Your Password</label>
        <input type="password" id="txtPassword1" class="form-control textPassword1" name="confirmpassword" maxlength="15" required >
        <i id="pass-status1" class="fa fa-eye-slash" aria-hidden="true" onClick="viewPassword1()"></i>
      </div>
      <a class="btn btn-lg btn-primary btn-block resetpassword">Change</a>
    </form>
  </div>
  <div class="welcomediv" id="welcomediv" style="display: none;">
    <!-- <img class="imagelogo" src="{{ config('app.url') }}public/images/logo.png"> -->
    <div class="screen un">
      <h3>SUCCESS!</h3>
      <p>Your password has been changed successfully.</p>
    </div>
  </div>
</main>

<style type="text/css">
main {
background-image:url({{url('public/images/car.jpg')}});
  -ms-flex-align: center;
  align-items: center;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-pack: center;
  height: 100%;
}

.screen.un {
    width: 100%;
    text-align: center;
}

div#welcomediv {
    width: 100%;
}
.btn-primary {
    color: #fff;
    background-color: #04476a;
    border-color: #04476a;
}
.fa {
    display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    float: right;
    position: relative;
    bottom: 26px;
    right: 17px;
}
div#changepassdiv {
width: 650px;
background: #FFFF;
padding: 55px 40px;
}
  .bd{
    background-color : #daebfa8a;
  }
label {
display: inline-block;
max-width: 100%;
margin-bottom: 5px;
font-weight: 700;
color: #ffffffa3;
}
.sweet-alert h2 {
    color: #575757;
    font-size: 22px;
    text-align: center;
    font-weight: 600;
    text-transform: none;
    position: relative;
}
h2 {
margin-bottom: 35px;
}
</style>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
$("#pass-status").on("click",function()
{
    var passwordInput = document.getElementById('txtPassword');
    var passStatus = document.getElementById('pass-status');

      if (passwordInput.type == 'password')
      {
        passwordInput.type='text';
        passStatus.className='fa fa-eye';
      }
      else
      {
        passwordInput.type='password';
        passStatus.className='fa fa-eye-slash';
      }
});

$("#pass-status1").on("click",function()
{
    var passwordInput = document.getElementById('txtPassword1');
    var passStatus = document.getElementById('pass-status1');
    if (passwordInput.type == 'password'){
      passwordInput.type='text';
      passStatus.className='fa fa-eye';
    }
    else
    {
      passwordInput.type='password';
      passStatus.className='fa fa-eye-slash';
    }
});

$(".resetpassword").on("click",function()
{
  var txtPassword = $("#txtPassword").val();
  var txtPassword1 = $("#txtPassword1").val();
  var re1 = /[0-9]/;
  var re2 = /[a-z]/;
  var re3 = /[A-Z]/;
  var re4 = /[^\w]/;
  if(txtPassword=="" )
  {
    swal('Please enter password.');
  }
  else if(txtPassword1=="" )
  {
    swal('Please enter confirm password.');
  }
  else if(txtPassword < 6 || !re1.test(txtPassword) || !re2.test(txtPassword) || !re3.test(txtPassword) || !re4.test(txtPassword))
  {
       swal("Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.");
       form.password.focus();
       return false;
  }
  else
  {
    if(txtPassword==txtPassword1)
    {
        jQuery.ajax({
            url:"{{url('/user/changePassword')}}",
            headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            data:new FormData($("#resetpasswordForm")[0]),
            method:"POST",
            processData: false,
            contentType: false,
            success:function(data){
                swal("Password changed successfully.");
                $("#changepassdiv").hide();
                $("#welcomediv").show();
            },
            error:function(error){
            console.log(error);
            }
        });
    }
    else
    {
      swal("Password does not match");
    }
  }

});
</script>
