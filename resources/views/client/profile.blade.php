@extends('client.template')

@section('styles')
    <style>
        p {
            font-size: 18px;
        }

        small {
            font-size: 14px;
        }

        textarea {
            height: 100px !important;
        }

        #main_profile {

            padding: 20px;

        }

        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #8e8e93 !important;
            opacity: 1 !important; /* Firefox */
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            }
            .avatar-edit {
                position: absolute;
                z-index: 1;
                top: 10px;
            }
                .avatar-edit input {
                    display: none !important;
                }
                    input + label {
                        display: inline-block;
                        width: 34px;
                        height: 34px;
                        margin-bottom: 0;
                        border-radius: 100%;
                        background: #FFFFFF;
                        border: 1px solid transparent;
                        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                        cursor: pointer;
                        font-weight: normal;
                        transition: all .2s ease-in-out;
                    }
                        input + label:hover {
                            background: #f1f1f1;
                            border-color: #d6d6d6;
                        }
                        .avatar-upload .avatar-edit input + label::after {
                            content: "\f040";
                            font-family: 'FontAwesome';
                            color: #757575;
                            position: absolute;
                            top: 10px;
                            left: 0;
                            right: 0;
                            text-align: center;
                            margin: auto;
                        }
                    
                
            
            .avatar-preview {
                width: 192px;
                height: 192px;
                position: relative;
                border-radius: 100%;
                border: 6px solid #F8F8F8;
                box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            }
                .avatar-preview > div {
                    width: 100%;
                    height: 100%;
                    border-radius: 100%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center;
                }
            
        input#submit {
            margin-left: 10px;
        }

        input#submit:hover {
            background-color: #333;
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
                            <form action="{{ route('client_profile_pic') }}" method="POST" enctype="multipart/form-data">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" name="profile_pic_file" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div id="avatarPreview" class="avatar-preview">
                                    <div id="imagePreview" style="background-image: url('/uploads/{{ $profile->profile_pic_file }}');"></div>
                                        <input type="submit" id="submit" class="btn btn-success" value="Update my profile pic">
                                    </div>
                                </div>

                                @csrf
                            </form>
                        </div>
                    </div>
                    <br><br>
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
                            <a href="#" id="update" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Request update</a>
                            <a href="#" id="update2" class="btn btn-primary">Change info</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div id="right-panel" class="col-md-12" style="display:none">
                            <form action="{{ route('client_store_profile') }}" method="post">
                                {{--<div class="form-group">
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
                                </div>--}}
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">Contact number</label>
                                    <input type="tel" class="form-control form-control-sm" id="contact" name="contact" required pattern="[0-9]{11}" placeholder="09123456789" value="{{ $profile->contact }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-form-label col-form-label-sm">E-mail:</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="my_name@email.com" value="{{ $user->email }}">
                                </div>
                                {{--<div class="form-group">
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
                                </div>--}}

                                <button type="submit" class="btn btn-primary">Submit</button>

                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
          
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Request Information</h4>
                </div>
                <div class="modal-body">
                    <form id="request" action="{{route('client_request_pending_store')}}" method="POST">
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
                                <textarea class="form-control" id="full_name" name="full_name" placeholder="First Name: 
Middle Name: 
Last Name: "></textarea>
                                <input class="form-control" type="date" id="bday" name="bday">
                                <select class="form-control" id="gender" name="gender">
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
        $( document ).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });

            $("cupdate2").click(function() {
                if ($("#update2").html() == "Change info") {
                    $("#update2").html("Cancel");
                } else {
                    $("#update2").html("Change info");
                }

                $("#right-panel").fadeToggle("slow");
            });

            $("#bday").hide();
            $("#gender").hide();

            $("#title").change(function () {
                if ($("#title").val() == "Change name") {
                    $("#full_name").attr("placeholder", "First Name: \nMiddle Name: \nLast Name: ");

                    $("#full_name").show();
                    $("#bday").hide();
                    $("#gender").hide();
                }
                else if ($("#title").val() == "Change location") {
                    $("#full_name").attr("placeholder", "Address: \nCity: \nProvince: ");

                    $("#full_name").show();
                    $("#bday").hide();
                    $("#gender").hide();
                }
                else if ($("#title").val() == "Change birthdate") {
                    $("#bday").show();
                    $("#full_name").hide();
                    $("#gender").hide();
                }
                else if ($("#title").val() == "Change gender") {
                    $("#gender").show();
                    $("#bday").hide();
                    $("#full_name").hide();
                }
            });
        });
    </script>
@endsection