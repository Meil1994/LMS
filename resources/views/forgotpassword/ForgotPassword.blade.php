
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
      <div style="background-color:#033c59; padding-bottom:35px;">
        <div class="container">
           
          <div class="lg:grid lg:grid-cols-11" style="">

            <div class="mt-5 lg:col-span-5 flex lg:w-100 xmm:w-550 xmm:ml-auto xmm:mr-auto" style="text-align:center;">
              <div> 
                <img class="ml-auto mr-auto" src="img/e-taguyodlogo.png" alt="Image" class="img-fluid">
              </div>
            </div>

            <div class="hidden lg:block lg:col-span-1 border-l border-white mb-5 mt-4 w-1 bg-white ml-auto mr-auto"></div>

            <div class="lg:w-75 lg:col-span-5 xmm:w-550 xmm:ml-auto xmm:mr-auto mt-3 p-4 mb-5">
            <div>
              <div style="text-align:center;">

                <div class="text-center mb-4">
                  <img class="ml-auto mr-auto" src="img/sign_in_icon.png" style="height:80px; width:80px;">
                  <h3 class="text-white">Password Reset</h3>
                </div>

                    <form method="POST" action="/resetpassword">
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
                          <div class="flex justify-center pt-5">
                            <button type="submit" class="btn btn-block btn-primary w-60">Reset Password</button>
                          </div>
                    </form>

              </div>
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