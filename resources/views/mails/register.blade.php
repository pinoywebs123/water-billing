<!DOCTYPE html>
<html lang="en">
<head>
  <title>Water Billing System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">
    
        <form>
            <div class="container">
                <div class="row ">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">E-mail:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">{{ $user->email }}</p>
                    </div>
                </div>    

                <div class="row ">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">Password:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">{{ $password }}</p>
                    </div>
                </div>    
                
                <div class="row">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">Full Name:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">{{ $profile->first_name }} {{ $profile->middle_name }} {{ $profile->last_name }}</p>
                    </div>
                </div>
        
                <div class="row ">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">Birth Date:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">
                            <?php
                                
                                $date = new DateTime($profile->birth_date);
                                echo $date->format('F d, Y');
                                
                            ?>
                        </p>
                    </div>
                </div>
        
                <div class="row ">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">Gender:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">{{ $profile->gender }}</p>
                    </div>
                </div>
        
                <div class="row ">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">Contact number:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">{{ $profile->contact }}</p>
                    </div>
                </div>      
                
                <div class="row ">
                    <div class="col-md-12">
                        <small class="text-primary font-weight-bold">Complete address:</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-secondary">{{ $profile->address }}, {{ $profile->city }}, {{ $profile->province }}</p>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
</body>
</html>