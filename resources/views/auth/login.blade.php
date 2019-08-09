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
  }
  .input-group{
    margin-bottom: 15px;
  }
 
  </style>
</head>
<body>




<div class="container">
    
    <div class="col-md-6 col-md-offset-3 well">
      <center>
       <img src="{{URL::to('images/logo.jpg')}}" width="120px">
    </center>
      @if(Session::has('error'))
        <div class="alert alert-danger">
          {{Session::get('error')}}
        </div>
      @endif
      <form action="{{route('loginCheck')}}" method="POST">
      
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">@</span>
          <input type="email" name="email" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
          <span class="input-group-addon glyphicon glyphicon-lock" id="basic-addon1"></span>
          <input type="password" name="password" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Login</button>
          @csrf
        </div>
      </form>
    </div>
</div>
</body>
</html>
