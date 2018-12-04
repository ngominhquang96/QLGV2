<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/login.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js" ></script>
    <style>
          .error {
              width: 100%;
              color : red;
              font-size: 1.0vw; 
              text-align: left;
          }
    </style>

  </head>

  <body class="text-center">

    <form class="form-login" action="#" method="POST" id="form-login" role="form" >
    
      <div class="login">
            <p style="color: red; display: none" class="error errorLogin"></p>

            <h1 class="h3 mb-3 font-weight-bold" id="title-login">Login</h1>
            <label id="label">Email</label>
            <input type="email" id="inputEmail" name="inputEmail" class="form-control inputEmail" required autofocus>
            <p style="color: red ; display : none;" class="error errorEmail"></p>
            <br>

            <label id="label">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" required>
            <p style="color : red ; display: none;" class="error errorPassword "></p>
            <br>
            <div class="form_submit">
            <input class="btn" type="submit" id="login" value="Login">
            </div>
            <br>

      </div>
      
    </form>
    <br>
    <!-- <div style="font-size: 1.0vw; color: white;">
      <div style="display: inline;">© 2017  IAT QLGV, Inc. Powered by </div>
      <a href="https://www.facebook.com/IA-Technology-Corporation-248433228915394/" style="font-weight: bold;">IA Technology Coporation</a>.     
    </div> -->
  </body>
  <footer>
    <div style="display: inline;">© 2017  IAT QLGV, Inc. Powered by </div>
    <a href="https://www.facebook.com/IA-Technology-Corporation-248433228915394/" style="font-weight: bold;">IA Technology Coporation</a> 
    </div>
  </footer>
  <script type="text/javascript">
    $(function(){
      $('#form-login').validate({
        rules:{
          inputEmail : {
            required : true,
            email : true,
          },
          inputPassword : {
            required : true,
            minlength : 6,
          },
        },
        messages : {
          inputEmail : {
            required : "*Please enter your email!",
            email : "*Your email is wrong!",
          },
          inputPassword : {
            required : "*Please enter your password!",
            minlength : "*Password must include at least 6 characters.",
          }
        },
        submitHandler:function(){
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });

          $.ajax({
            'url': 'login',
            'data' : {
            'email' : $('#inputEmail').val(),
            'password' : $('#inputPassword').val(),
            },
            'type' : 'POST',
            success:function(data){  
              console.log(data);
              if (data.error == true) {
                $('.error').hide();
                if (data.message.email != undefined) {
                  $('.errorEmail').show().text(data.message.email[0]);
                }
                if (data.message.password != undefined) {
                  $('.errorPassword').show().text(data.message.password[0]);
                }
                if (data.message.errorlogin != undefined) {
                  $('.errorLogin').show().text(data.message.errorlogin[0]);
                }
              }else{
                window.location.href = "http://localhost/QLGV/public/profile";
              }
            }
          })
        }

      });
    });
  </script>
</html>