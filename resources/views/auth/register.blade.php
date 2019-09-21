<!DOCTYPE html>
<html lang="en">
<head>

  <title>Water Billing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #f5f6f7;
    background: #2c3e50;
  }

  p {font-size: 16px;}
  
  .well{
    border-radius: 30px;
    margin-top: 10%;
    opacity: 0.9;
  }
  .input-group{
    margin-bottom: 15px;
  }
  body {
  background: url('{{URL::to('images/bg.jpg')}}') no-repeat center center fixed;
  background-size: cover;
  height: 100%;
}

label {
    color: #000;
}

hr {
    border-color: #ccc;
}
 
  </style>
</head>
<body>




<div class="container">
    
    <div class="col-md-6 col-md-offset-3 well">
      <center>
       <img src="{{URL::to('images/logo2.png')}}" width="120px">
    </center>
      @if(Session::has('error'))
        <div class="alert alert-danger">
          <p>{{Session::get('error')}}</p>
        </div>
      @endif

        <form action="{{ route('store_profile_user') }}" method="post">
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">E-mail:</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="my_name@email.com">

                <label for="" class="col-form-label col-form-label-sm">Password:</label>
                <input type="password" class="form-control form-control-sm" id="password" name="password" required>
            </div>

            <hr />

            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm" class="col-form-label col-form-label-sm">First Name:</label>
                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" required placeholder="Enter first name">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Middle Name:</label>
                <input type="text" class="form-control form-control-sm" id="middle_name" name="middle_name" required placeholder="Enter middle name">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Last Name:</label>
                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" required placeholder="Enter last name">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Birth Date:</label>
                <input type="date" class="form-control form-control-sm" id="birth_date" name="birth_date" required>
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Gender</label>
                <select class="form-control form-control-sm" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Contact number</label>
                <input type="tel" class="form-control form-control-sm" id="contact" name="contact" required pattern="[0-9]{11}" placeholder="09123456789"">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Address:</label>
                <input type="text" class="form-control form-control-sm" id="address" name="address" required placeholder="123 Street">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">City:</label>
                <input type="text" class="form-control form-control-sm" id="city" name="city" required placeholder="Cebu City">
            </div>
            <div class="form-group">
                <label for="" class="col-form-label col-form-label-sm">Province:</label>
                <input type="text" class="form-control form-control-sm" id="province" name="province" required placeholder="Cebu">
            </div>

            <div class="text-center"> 
                <button type="submit" class="btn btn-primary">Submit</button> 
                <a href="{{ route('login') }}" class="btn btn-default">Done</button> 
            </div>

            @csrf
        </form>

      {{-- <form action="{{route('loginCheck')}}" method="POST">
      
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="email" name="email" class="form-control"  aria-describedby="basic-addon1" data-toggle="tooltip" title="Enter Email" data-placement="right">
        </div>
        <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
          <input type="password" name="password" class="form-control"  aria-describedby="basic-addon1" data-toggle="tooltip" title="Enter Password" data-placement="right">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
          <a href="{{ route('register') }}" class="btn btn-default btn-block">Register</a>
          @csrf
        </div>
      </form> --}}
    </div>
</div>
</body>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
</html>
