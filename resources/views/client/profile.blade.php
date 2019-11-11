@extends('client.template')

@section('styles')
    <style>
        p {
            font-size: 18px;
        }

        small {
            font-size: 14px;
        }

        #main_profile {

            padding: 20px;

        }

        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #8e8e93 !important;
            opacity: 1 !important; /* Firefox */
        }
    </style>
@endsection

@section('contents')
    <h1>My Profile</h1>

    @include('shared.notif')
    
    <div id="main_profile" class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="container">
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
                            <small class="text-primary font-weight-bold">Complete address:</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-secondary">{{ $profile->address }}, {{ $profile->city }}, {{ $profile->province }}</p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <a href="#" id="update" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update info</a>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div id="right-panel" class="col-md-12" style="display:none">
                            <form action="{{ route('client_store_profile') }}" method="post">
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm" class="col-form-label col-form-label-sm">First Name:</label>
                                    <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" required placeholder="Enter first name" value="{{ $profile->first_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Middle Name:</label>
                                    <input type="text" class="form-control form-control-sm" id="middle_name" name="middle_name" required placeholder="Enter middle name" value="{{ $profile->middle_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Last Name:</label>
                                    <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" required placeholder="Enter last name" value="{{ $profile->last_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Birth Date:</label>
                                    <input type="date" class="form-control form-control-sm" id="birth_date" name="birth_date" required value="{{ $profile->birth_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Gender</label>
                                    <select class="form-control form-control-sm" id="gender" name="gender" required value="{{ $profile->gender }}">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Contact number</label>
                                    <input type="tel" class="form-control form-control-sm" id="contact" name="contact" required pattern="[0-9]{11}" placeholder="09123456789" value="{{ $profile->contact }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">E-mail:</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="my_name@email.com" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Address:</label>
                                    <input type="text" class="form-control form-control-sm" id="address" name="address" required placeholder="123 Street" value="{{ $profile->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">City:</label>
                                    <input type="text" class="form-control form-control-sm" id="city" name="city" required placeholder="Cebu City" value="{{ $profile->city }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Province:</label>
                                    <input type="text" class="form-control form-control-sm" id="province" name="province" required placeholder="Cebu" value="{{ $profile->province }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>

                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Request Information</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('client_request_pending_store')}}" method="POST">
                            <div class="form-group">
                                <label>Request to</label>
                                
                                <select class="form-control" id="title" name="title" required>
                                    <option value="Change name">Change name</option>
                                    <option value="Change location">Change location</option>  
                                    <option value="Change birthdate">Change birthdate</option> 
                                    <option value="Change gender">Change gender</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Update</label>
                                <textarea class="form-control" id="answer" name="answer" placeholder="First Name: 
Middle Name: 
Last Name: "></textarea>
                                <input class="form-control" type="date" id="bday" name="answer">
                                <select class="form-control" id="gender" name="answer">
                                    <option disabled selected>Select a gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Request Reason/Content</label>
                                <textarea class="form-control" id="content" name="content" placeholder="Insert more info if needed"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        @csrf
                            </div>
                    </form>
                </div>
                
                </div>
            
            </div>
        </div>	
    </div>
@endsection

@section('scripts')
    <script>
        $("#update").click(function() {
            $("#right-panel").fadeToggle("slow");
        });

        $("#bday").hide();
        $("#gender").hide();

        $("#title").change(function () {
            if ($("#title").val() == "Change name") {
                $("#answer").attr("placeholder", "First Name: \nMiddle Name: \nLast Name: ");
            }
            else if ($("#title").val() == "Change location") {
                $("#answer").attr("placeholder", "Address: \nCity: \nProvince: ");
            }
            else if ($("#title").val() == "Change birthdate") {
                $("#bday").show();
                $("#answer").hide();
                $("#gender").hide();
            }
            else {
                $("#gender").show();
                $("#bday").hide();
                $("#answer").hide();
            }
        });
    </script>
@endsection