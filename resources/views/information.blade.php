<!DOCTYPE html>
<html>
<head>
    <title>Input Personal Information</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
  <div class="container mt-4">
  @if($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Personal Information
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="informationForm" method="post" action="store">
        <div class="form-group">
          <label>Full Name</label>
          <input type="text" id="name" name="name"  class="form-control" required>
        </div>

        <div class="form-group">
          <label>Email Address</label>
          <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="row">
            <div class="col">
                <label>Address</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div> 
            <div class="col">
                <label>Mobile Number</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label >Date of Birth</label>
                <input type="date" id="birthday" name="birthday"  
                onchange ='document.getElementById("age").value =(new Date().getFullYear() - new Date(document.getElementById("birthday").value).getFullYear())
                'class="form-control" required>
            </div>

            <div class="col">
            <label >Age</label>
            <input type="text" id="age" name="age" class="form-control" readonly>
            </div>

            <div class="col-md4" style="margin-top:37px;">
            <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Prefer Not Say</option>
                    </select>
            </div>
        </div>
        <button type="submit"  style="margin-top:37px;" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">

$('#informationForm').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let age = $('#age').val();
    let gender = $('#gender').val();
    let address = $('#address').val();
    let birthday = $('#birthday').val();
    $.ajax({
      url: "/store",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        email:email,
        phone:phone,
        age:age,
        gender:gender,
        address:address,
        birthday:birthday,
      },
      success:function(response){
        $('#successMsg').show();
        console.log(response);
      },
      error: function(response) {
        $('#nameErrorMsg').text(response.responseJSON.errors.name);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#phoneErrorMsg').text(response.responseJSON.errors.phone);
        $('#ageErrorMsg').text(response.responseJSON.errors.age);
        $('#genderErrorMsg').text(response.responseJSON.errors.gender);
        $('#addressErrorMsg').text(response.responseJSON.errors.address);
        $('#birthdayErrorMsg').text(response.responseJSON.errors.birthday);
      },
      });
    });
  </script>