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
    <h1>Change password</h1>
    @include('shared.notif')
    <form action="{{ route('client_store_change_pass') }}" method="post" style="width: 600px">
        <div class="form-group">
            <label for="">Old password</label>
            <input type="password" class="form-control" id="old_password" name="old_password" required>
        </div>
        <div class="form-group">
            <label for="">New password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="">Confirm new password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Change password</button>

        @csrf;
    </form>
@endsection

@section('scripts')
    <script>
        $("#update").click(function() {
            $("#right-panel").fadeToggle("slow");
        });
    </script>
@endsection