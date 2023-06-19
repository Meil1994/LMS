<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    @include('components.Links') 

    @include('components.Script') 
  </head>
  <body>
    <div class="wrapper" id="wrapper">
      <!-- Hero Images, Navigation, Texts -->
  <section class="top">
    @include('components.Nav')
  </section>
      <div class="pt-5" style="background-color:#033c59; padding-bottom:35px;">
        <div class="container">
           
          <div class="lg:grid lg:grid-cols-11" style="">

            <div class="mt-5 lg:col-span-5 flex lg:w-100 xmm:w-550 xmm:ml-auto xmm:mr-auto" style="text-align:center;">
              <div> 
                <img class="ml-auto mr-auto" src="img/e-taguyodlogo.png" alt="Image" class="img-fluid">
              </div>
            </div>

            <div class="hidden lg1:block lg:col-span-1 border-l border-white mb-5 mt-4 w-1 bg-white ml-auto mr-auto"></div>

            <div class="lg1:w-75 lg:col-span-5 xmm:w-550 xmm:ml-auto xmm:mr-auto mt-3 p-4 mb-5">
                <div style="text-align:center;">
                  <div class="text-center mb-4">
                    <img class="ml-auto mr-auto" src="img/sign_in_icon.png" style="height:80px; width:80px;">
                    <h3 class="text-white">Mag Sign In</h3>
                  </div>

                        <form method="POST" action="/emailauthenticate">
                          @csrf

                          <div class="form-group first">
                            <label for="username" class="text-white text-lg float-left mb-1"><i class="fa fa-duotone fa-user"></i>&nbsp;&nbsp; Email</label>
                            <input 
                            type="Email" 
                            class="form-control h-14" 
                            id="username" 
                            name="email"
                            value="{{old('email')}}">
                            
                          </div>
                          @error('email')
                            <p class="text-left text-red-500">{{$message}}</p>
                          @enderror

                          <div class="form-group last mt-3">
                            <label for="password" class="text-white text-lg float-left mb-1"><i class="fa fa-solid fa-lock"></i>&nbsp;&nbsp; Password</label>
                            <input 
                            type="password" 
                            class="form-control h-14"  
                            id="password" 
                            name="password" 
                            >
                          </div>  
                          @error('password')
                            <p class="text-left text-red-500">{{$message}}</p>
                          @enderror

                          <div class=" mb-3 align-items-center xm1:flex xm1:justify-evenly mt-4">
                            <label class="control control--checkbox mb-1 w-150 ml-auto mr-auto xm1:ml-0 xm1:mr-0"><span class="caption" style="color:white;">Remember me</span>
                              <input type="checkbox" name="remember">
                              <div class="control__indicator mx1:ml-20"></div>
                            </label>
                            <span><a href="/resetpassword" class="forgot-pass" style="color:white;">Forgot Password</a></span>
                          </div>

                          <div class="flex justify-center pt-4">
                          <button type="submit" class="btn btn-block btn-primary w-60">Sign In</button>
                          </div>
                          <div class="flex justify-center pt-3">
                            <button type="button" onclick="window.location.href='/signin'" href="/signin" class="text-13 text-white no-underline p-1 rounded-md">Login using Username</button>
                          </div>
                        </form>
                </div>         
            </div>
            </div>
        </div>
      </div>
      @include('components.Footer')
  </body>
</html>
<script>
  document.getElementById('username').addEventListener('focusin', () => {
    document.getElementById("username_label").innerHTML = '';
  });
  document.getElementById('username').addEventListener('focusout', () => {
    if(document.getElementById("username").value.trim() == "")
    {
      document.getElementById("username_label").innerHTML = '<i class="fa fa-duotone fa-user"></i>&nbsp;&nbsp; Username';
    }
  });

  document.getElementById('password').addEventListener('focusin', () => {
    document.getElementById("password_label").innerHTML = '';
  });
  document.getElementById('password').addEventListener('focusout', () => {
    if(document.getElementById("password").value.trim() == "")
    {
      document.getElementById("password_label").innerHTML = '<i class="fa fa-solid fa-lock"></i>&nbsp;&nbsp; Password';
    }
  });
 
  if(document.getElementById("username").value.trim() == "")
  {
    document.getElementById("username_label").innerHTML = '<i class="fa fa-duotone fa-user"></i>&nbsp;&nbsp; Username';
  }
  else
  {
    document.getElementById("username_label").innerHTML = '';
  }

  if(document.getElementById("password").value.trim() == "")
  {
    document.getElementById("password_label").innerHTML = '<i class="fa fa-solid fa-lock"></i>&nbsp;&nbsp; Password';
  }
  else
  {
    document.getElementById("password_label").innerHTML = '';
  }
</script>