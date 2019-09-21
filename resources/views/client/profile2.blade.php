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
                            <p class="text-secondary">&nbsp;</p>
                        </div>
                    </div>
            
                    <div class="row ">
                        <div class="col-md-12">
                            <small class="text-primary font-weight-bold">Birth Date:</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-secondary">&nbsp;</p>
                        </div>
                    </div>
            
                    <div class="row ">
                        <div class="col-md-12">
                            <small class="text-primary font-weight-bold">Gender:</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-secondary">&nbsp;</p>
                        </div>
                    </div>
            
                    <div class="row ">
                        <div class="col-md-12">
                            <small class="text-primary font-weight-bold">Contact number:</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="text-secondary">&nbsp;</p>
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
                            <p class="text-secondary">&nbsp;</p>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12">
                            <a href="#" id="update" class="btn btn-primary">Update info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="container">
                    <div class="row">
                        <div id="right-panel" class="col-md-12" style="display:none">
                            <form action="{{ route('client_store_profile') }}" method="post">
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
                                    <label for="" class="col-form-label col-form-label-sm">E-mail:</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" required placeholder="my_name@email.com" value="{{ $user->email }}">
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

                                <button type="submit" class="btn btn-primary">Submit</button>

                                @csrf
                            </form>
                        </div>
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
    </script>
@endsection