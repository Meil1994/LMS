
<!doctype html>
<html lang="en">
  <head>
    @vite('resources/css/app.css')
    <style>
      ::placeholder
      {
        /* font-weight: bold; */
        opacity: 0.6;
        color: #8D918D;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('components.Links') 

    @include('components.Script') 
  </head>
  <body>
    <div class="wrapper" id="wrapper">
      <!-- Hero Images, Navigation, Texts -->
  <section class="top">
    @include('components.Nav')
  </section>
      <div class="pt-4" style="background-color:#033c59; padding-bottom:20px;">
        <div class="" style="padding-left:12px; padding-right:12px;"> <!-- container -->
          <div class="lg1:grid lg1:grid-cols-11" style="">

            <div class="mt-5 lg1:col-span-5 flex lg1:w-100 xmm:w-550 xmm:ml-auto xmm:mr-auto" style="text-align:center;">
              <div> 
                <img class="ml-auto mr-auto" src="img/e-taguyodlogo.png" alt="Image" class="img-fluid">
              </div>
              
            </div>


            <div class="hidden lg1:block lg1:col-span-1 border-l border-white mb-5 mt-4 w-1 bg-white ml-auto mr-auto"></div>
   

            <div class="lg1:w-480 lg1:col-span-5 xmm:w-550 xmm:ml-auto xmm:mr-auto mt-3 p-4 mb-5">
                <div class="col-md-12" style="">

                  <div class="text-center mb-4">
                    <img class="ml-auto mr-auto" src="img/sign_up_icon.png" style="height:60px; width:60px;">
                    <h3 class="text-white">Mag sign-up</h3>
                  </div>


                  <form method="POST" action="/users" c>
                    @csrf

                   
                    <div class="xmm:grid xmm:grid-cols-2">
                      <div class="mb-2 xmm:mr-1">
                        <label class="text-white"><i class="fa fa-thin fa-users"></i> Type of User</label>
                        <select
                          name="user_type"
                          onclick="document.getElementById('type_of_user_select').style.border = '2px solid #033c59';" 
                          aria-label="Default select example" 
                          class="w-100 rounded-md p-1" 
                          id="type_of_user_select" 
                          required>
                          <option value="Teacher">Teacher</option>
                          <option value="Student">Student</option>
                        </select>
                        @error('user_type')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>
  
                      <div class="xmm:ml-1 mb-2">
                        <label class="text-white"><i class="fa fa-thin fa-user"></i> Username</label>
                        <input 
                        name="username"
                        value="{{old('username')}}"
                        type="text" 
                        class="w-100 rounded-md p-1" 
                        id="username_textfield" 
                        placeholder="Marites123" 
                        onclick="document.getElementById('username_textfield').style.border = '2px solid #033c59';"/>
                        @error('username')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="xmm:grid xmm:grid-cols-2 mb-2">

                      <div class="xmm:mr-2">
                        <label class="text-white"><i class="fa fa-thin fa-lock"></i> Password</label>
                        <input 
                        name="password"
                        value="{{old('password')}}"
                        type="password" 
                        class="w-100 rounded-md p-1 align-center" 
                        id="password_textfield" 
                        placeholder="**********" 
                        onclick="document.getElementById('password_textfield').style.border = '2px solid #033c59';"/>
                        @error('password')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>

                      <div>
                        <label class="text-white flex"><i class="fa fa-thin fa-lock mr-1"></i> Confirm Password</label>
                        <input 
                        name="password_confirmation"
                        value="{{old('password_confirmation')}}"
                        type="password" 
                        class="w-100 rounded-md p-1" 
                        id="confirm_password_textfield" 
                        placeholder="**********" 
                        onclick="document.getElementById('confirm_password_textfield').style.border = '2px solid #033c59';"/>
                        @error('password_confirmation')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="xmm:grid xmm:grid-cols-3">
                      
                      <div class="mb-2">
                        <label class="text-white flex"><i class="fa fa-thin fa-signature"></i> First Name</label>
                        <input 
                        class="w-100 rounded-md p-1" 
                        name="firstname"
                        value="{{old('firstname')}}"
                        type="text" 
                        id="first_name_textfield" 
                        placeholder="Jose" 
                        onclick="document.getElementById('first_name_textfield').style.border = '2px solid #033c59';"/>
                        @error('firstname')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="mb-2 xmm:ml-2 xmm:mr-2">
                        <label class="text-white flex"><i class="fa fa-thin fa-signature"></i> Middle Name</label>
                        <input 
                        class="w-100 rounded-md p-1" 
                        name="middlename"
                        value="{{old('middlename')}}"
                        type="text" 
                        class="" 
                        id="middle_name_textfield" 
                        placeholder="Alonso" 
                        onclick="document.getElementById('middle_name_textfield').style.border = '2px solid #033c59';"/>
                        @error('middlename')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="mb-2">
                        <label class="text-white flex"><i class="fa fa-thin fa-signature"></i> Last Name</label>
                        <input 
                        class="w-100 rounded-md p-1" 
                        name="lastname"
                        value="{{old('lastname')}}"
                        type="text" 
                        class="" 
                        id="last_name_textfield
                        placeholder="Rizal" 
                        onclick="document.getElementById('last_name_textfield').style.border = '2px solid #033c59';"/>
                        @error('lastname')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                   
                    <div class="xmm:grid xmm:grid-cols-3">
                      <div class="mb-2 xmm:mr-1">
                        <label class="text-white flex mb-0"><i class="fa fa-thin fa-phone"></i> Phone Number</label>
                        <input 
                        class="w-100 rounded-md p-1 mt-0" 
                        name="phone_number"
                        value="{{old('phone_number')}}"
                        type="number"  
                        id="phone_number_textfield" 
                        placeholder="09123123123" 
                        onclick="document.getElementById('phone_number_textfield').style.border = '2px solid #033c59';"/>
                        @error('phone_number')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="mb-2 xmm:ml-1 xmm:mr-1">
                        <label class="text-white"><i class="fa fa-birthday-cake" aria-hidden="true"></i> Birth Date</label>
                        <input 
                        class="w-100 rounded-md p-1" 
                        name="birthday"
                        value="{{old('birthday')}}"
                        type="date" 
                        id="birth_date_textfield" 
                        onclick="document.getElementById('birth_date_textfield').style.border = '2px solid #033c59';"/>
                        @error('birthday')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>

                      <div class="mb-1">
                        <label class="text-white"><i class="fa fa-thin fa-venus-mars"></i> Gender</label>
                        <div class="border border-black p-2 rounded-md">
                          <div class="flex justify-between h-4 items-center">
                            <div class="flex">
                              <input 
                              name="gender" 
                              type="radio" 
                              id="male" 
                              value="Male" 
                              onclick="document.getElementById('gender_outline').style.border = '2px solid white';"/>
                              <label class="text-sm text-white" for="html">Male</label>
                            </div>
  
                            <div class="flex">
                              <input 
                              name="gender" 
                              type="radio" 
                              id="female" 
                              value="Female" 
                              onclick="document.getElementById('gender_outline').style.border = '2px solid white';"/>
                              <label class="text-white text-sm" for="css">Female</label>
                            </div>
                          </div>
                        </div>
                        @error('gender')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>  
                    </div>

                    <div class="xmm:grid xmm:grid-cols-2">
                      <div class="mb-2 xmm:mr-1"> 
                        <label class="text-white"><i class="fa fa-thin fa-envelope"></i> Email</label>
                        <input 
                        class="w-100 rounded-md p-1" 
                        name="email"
                        value="{{old('email')}}"
                        type="text" 
                        class="" 
                        id="email_textfield" 
                        placeholder="joserizal@gmail.com" 
                        onclick="document.getElementById('email_textfield').style.border = '2px solid white';"/>
                        @error('email')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>
                    
                      <div class="mb-2 xmm:ml-1">
                        <label class="text-white"><i class="fa fa-thin fa-address-book"></i> Address</label>
                        <input 
                        class="w-100 rounded-md p-1" 
                        name="address"
                        value="{{old('address')}}"
                        type="text" 
                        class="" 
                        id="address_textfield" 
                        placeholder="6 SDumulong Highway, Mambugan. Antipolo City, Rizal" 
                        onclick="document.getElementById('address_textfield').style.border = '2px solid white';"/>
                        @error('address')
                          <p class="text-left text-red-500 text-sm mb-0">{{$message}}</p>
                        @enderror
                      </div>

                    </div>
                    <div class="xmm:grid xmm:grid-cols-2 mt-4">
                      <div class="flex justify-center mt-3">
                        <button type="submit" class="btn btn-primary w-90 ml-auto mr-auto lg1:w-75" onclick="check_kung_may_error();"><i class="fa fa-thin fa-user-plus"></i>&nbsp;Sign-Up</button>
                      </div>
                      <div class="flex justify-center mt-3">
                        <button type="button" class="btn btn-secondary w-90 lg1:w-75" onclick="clear_button()"><i class="fa fa-thin fa-retweet"></i>&nbsp;Clear</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>         
            </div>
        </div>
      </div>
      @include('components.Footer')
   <div>
    <input type="hidden" id="lagayan_ng_response_kung_true_or_false_ang_username" value="adsf">
   </div>
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

  function change_color_to_blue()
  {
    document.getElementById('username_textfield').style.border = '2px solid #033c59';
    document.getElementById('password_textfield').style.border = '2px solid #033c59';
    document.getElementById('confirm_password_textfield').style.border = '2px solid #033c59';
    document.getElementById('first_name_textfield').style.border = '2px solid #033c59';
    document.getElementById('middle_name_textfield').style.border = '2px solid #033c59';
    document.getElementById('last_name_textfield').style.border = '2px solid #033c59';
    document.getElementById('phone_number_textfield').style.border = '2px solid #033c59';
    document.getElementById('birth_date_textfield').style.border = '2px solid #033c59';
    document.getElementById('email_textfield').style.border = '2px solid #033c59';
    document.getElementById('address_textfield').style.border = '2px solid #033c59';
    document.getElementById('type_of_user_select').style.border = '2px solid #033c59';
    document.getElementById('gender_outline').style.border = '2px solid white';
  }

  function clear_button()
  {
    document.getElementById("type_of_user_select").selectedIndex = "0";
    document.getElementById("username_textfield").value = "";
    document.getElementById("password_textfield").value = "";
    document.getElementById("confirm_password_textfield").value = ""; 
    document.getElementById("first_name_textfield").value = ""; 
    document.getElementById("middle_name_textfield").value = ""; 
    document.getElementById("last_name_textfield").value = ""; 
    document.getElementById("phone_number_textfield").value = ""; 
    document.getElementById("birth_date_textfield").value = ""; 
    document.getElementById("email_textfield").value = ""; 
    document.getElementById("address_textfield").value = "";
    document.getElementById("male").checked = false;
    document.getElementById("female").checked = false;

    change_color_to_blue()
  }

  var responseq = {};
  function select_user(action){
    $(document).ready(function(){
      var data = {
        action: action,
        username: $("#username_textfield").val(),
      };

      $.ajax({
        url: 'Functions/Functions.php',
        type: 'post',
        data: data,
        success:function(response){
          // alert(response);
          // responseq.username_validation = response;
          // callback(response);
          document.getElementById("lagayan_ng_response_kung_true_or_false_ang_username").value = response;
        }
      });
    });
  }

  function check_kung_may_error()
  {
    select_user('select_user');
    setTimeout(()=> {
      // alert(document.getElementById("lagayan_ng_response_kung_true_or_false_ang_username").value);
      }
      ,300);
      // alert(document.getElementById("lagayan_ng_response_kung_true_or_false_ang_username").value);
    if
    (
      document.getElementById("username_textfield").value == "" &&
      document.getElementById("password_textfield").value == "" &&
      document.getElementById("confirm_password_textfield").value == "" &&
      document.getElementById("first_name_textfield").value == "" &&
      document.getElementById("middle_name_textfield").value == "" &&
      document.getElementById("last_name_textfield").value == "" &&
      document.getElementById("phone_number_textfield").value == "" &&
      document.getElementById("birth_date_textfield").value == "" &&
      document.getElementById("email_textfield").value == "" &&
      document.getElementById("address_textfield").value == ""
    )
    {
      if(document.getElementById("username_textfield").value == "")
      {
        document.getElementById("username_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("password_textfield").value == "")
      {
        document.getElementById("password_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("confirm_password_textfield").value == "")
      {
        document.getElementById("confirm_password_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("first_name_textfield").value == "")
      {
        document.getElementById("first_name_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("middle_name_textfield").value == "")
      {
        document.getElementById("middle_name_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("last_name_textfield").value == "")
      {
        document.getElementById("last_name_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("phone_number_textfield").value == "")
      {
        document.getElementById("phone_number_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("birth_date_textfield").value == "")
      {
      if(document.getElementById("birth_date_textfield").value == "")
      {
        document.getElementById("email_textfield").style.border = "2px solid red";
      }
        document.getElementById("email_textfield").style.border = "2px solid red";
      }
      if(document.getElementById("address_textfield").value == "")
      {
        document.getElementById("address_textfield").style.border = "2px solid red";
      }
      Swal.fire(
        'Invalid Textfields!',
        'Textfields are Empty! Please fill-out the blanks!',
        'error'
      );
    }
    else if(document.getElementById("type_of_user_select").selectedIndex  == "0")
    {
      change_color_to_blue();
      document.getElementById("type_of_user_select").style.border = "2px solid red";
      Swal.fire(
        'Invalid Type of user!',
        'You must choose between Teacher or Student!',
        'error'
      );
    }
    else if(document.getElementById("username_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("username_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Username!',
        'Username textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("password_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("password_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Password!',
        'Password textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("confirm_password_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("confirm_password_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Confirm Password!',
        'Confirm Password textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("first_name_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("first_name_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid First Name!',
        'First Name textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("middle_name_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("middle_name_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Middle Name!',
        'Middle Name textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("last_name_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("last_name_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Last Name!',
        'Last Name textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("phone_number_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("phone_number_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Phone Number!',
        'Phone Number textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("birth_date_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("birth_date_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Birth Date!',
        'Birth Date textfield is Invalid!',
        'error'
      );
    }
    else if(document.getElementById("male").checked == false && document.getElementById("female").checked == false)
    {
      change_color_to_blue();
      document.getElementById("gender_outline").style.border = "2px solid red";
      Swal.fire(
        'Invalid Gender!',
        'Select your Gender!',
        'error'
      );
    }
    else if(document.getElementById("email_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("email_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Email!',
        'Email textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("address_textfield").value == "")
    {
      change_color_to_blue();
      document.getElementById("address_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Address!',
        'Address textfield is Empty!',
        'error'
      );
    }
    else if(document.getElementById("lagayan_ng_response_kung_true_or_false_ang_username").value == "true")
    {
      change_color_to_blue();
      document.getElementById("username_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Username!',
        'Username is already taken by other user!',
        'error'
      );
    }
    else if(document.getElementById("password_textfield").value != document.getElementById("confirm_password_textfield").value)
    {
      change_color_to_blue();
      document.getElementById("password_textfield").style.border = "2px solid red";
      document.getElementById("confirm_password_textfield").style.border = "2px solid red";
      Swal.fire(
        'Invalid Password!',
        'Passwords do NOT match!',
        'error'
      );
    }
    else
    {
      insert_user('insert_user');
      setTimeout(()=> {
        clear_button();
      }
      ,300);
    }
  }
</script>