<!-- JavaScript Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://kit.fontawesome.com/a1d3b7616a.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slidesjs/3.0/jquery.slides.min.js" integrity="sha512-TxlLXEZX6gqIhL0yu/40Aed5AJpP2DagJBE3cXgu1oLXoZ33TG3Na+I8Cdnb7KdM15Z5srcDIsbuGMBnESY+EQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- scrript only -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!-- ajax -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  function submitData(action){
    $(document).ready(function(){
      var data = {
        action: action,
        username: $("#text_generated_copy").val(),
        teacher_or_student: $("#teacher_or_student").val(),
      };

      $.ajax({
        url: 'Functions/Functions.php',
        type: 'post',
        data: data,
        success:function(response){
          // alert(response);
        }
      });
    });
  }

  function insert_user(action){
    $(document).ready(function(){
      if(document.getElementById("male").checked == true)
        $gender = "Male";
      else if(document.getElementById("female").checked == true)
        $gender = "Female";
      else
        $gender = "N/A";

      var data = {
        action: action,
        type_of_user: $("#type_of_user_select").val(),
        username: $("#username_textfield").val(),
        password: $("#password_textfield").val(),
        confirm_password: $("#confirm_password_textfield").val(),
        first_name: $("#first_name_textfield").val(),
        middle_name: $("#middle_name_textfield").val(),
        last_name: $("#last_name_textfield").val(),
        phone_number: $("#phone_number_textfield").val(),
        birth_date: $("#birth_date_textfield").val(),
        gender: $gender,
        email: $("#email_textfield").val(),
        address: $("#address_textfield").val(),
      };

      $.ajax({
        url: 'Functions/Functions.php',
        type: 'post',
        data: data,
        success:function(response){
          // alert(response);
          Swal.fire(
            'Creating Account Successfully!',
            'Thank you for signing up '+response+'! Mabuhay!',
            'success'
          );
        }
      });
    });
  }
</script>
