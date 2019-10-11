@extends('admin.template')

@section('styles')

    <style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #8e8e93 !important;
            opacity: 1 !important; /* Firefox */
        }
    </style>

@endsection

@section('contents')

    <h1>List of Staff</h1>
    <div class="container">
        <div class="row">
            @include('shared.notif')
            <div class="col">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $r = 0; ?>
                            @foreach ($staffs as $staff)
                                <?php $r++; ?>
                            <tr>
                                <td>{{ $staff->account_id }}</td>
                                <td>{{ $staff->profile->first_name }} {{ $staff->profile->middle_name }} {{ $staff->profile->last_name }}</td>
                                <td>{{ $staff->email }}</td>
                                <td>{{ $staff->role->name }}</td>
                                <td hidden>{{ $staff->role->id }}</td>
                                <td class="hidden">{{ $staff->profile->first_name }}</td>
                                <td class="hidden">{{ $staff->profile->middle_name }}</td>
                                <td class="hidden">{{ $staff->profile->last_name }}</td>
                                <td>
                                    <a class="edit btn btn-primary btn-xs" href="#" data-id="{{ $staff->id }}" data-toggle="modal" data-target="#addeditmodal"> 
                                        <i class="menu-icon fa fa-edit"></i> Edit 
                                    </a>
    
                                    {{-- <a class="remove" href="#" data-id="{{ $staff->id }}" data-toggle="modal" data-target="#removemodal"> 
                                        <i class="menu-icon fa fa-minus"></i> Remove 
                                    </a> --}}
                                </td>
                            </tr>
    
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div id="user" class="col">
                <a href="#" class="btn btn-primary add" data-toggle="modal" data-target="#addeditmodal">Add new user</a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addeditmodal" tabindex="-1" role="dialog" aria-labelledby="addeditmodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="addedit_user" action="{{ route('admin_store_staffs') }}" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addeditmodalLabel">New add</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; top:-25px;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id='resproc' class="row">
                            <div class="col" style="padding: 5px 20px;">
                                <input type="text" class="form-control" id="id" name="id" style="display: none;">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter middle name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" id="email" type="string" name="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" id="password" type="password" name="password" placeholder="Enter password">
                                </div>
                                <div class="form-group">
                                    <label for="passw">Role</label>
                                    <select class="form-control" id="role_id" name="role_id">
                                        <option disabled>Select the role for this staff</option>
                                        <option value='1'>Admin</option>
                                        <option value='2'>Billing</option>
                                        <option value='3'>Cashier</option>
                                        <option value='4'>staff</option>
                                        <option value='5'>Maintenance</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Account ID</label>
                                    <input type="text" class="form-control" id="account_id" name="account_id" required="" placeholder="001 - 009">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button id="submit" type="submit" class="btn btn-primary">Confirm</button>
                    </div>

                    @csrf
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="removemodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="remove_user" action="remove_user" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removemodalLabel">Remove staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="d-none form-control" id="id2" name="id2">
                        <p id="confirm"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button id="submit" type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    
@endsection

@section('scripts')

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();

            $(".add").click(function () {
                $("#addeditmodal .modal-title").html("Add staff");
                $("#addedit_user").attr("action", "{{ route('admin_store_staffs') }}");
                $("#name").val("");
                $("#email").val("");
                $("#submit").html("Add");
            });

            $(".edit").click(function () {
                $("#addeditmodal .modal-title").html("Edit staff");
                $("#addedit_user").attr("action", "{{ route('admin_update_staffs') }}");
                $("#id").val($(this).data('id'));
                $("#first_name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(5)").html());
                $("#middle_name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(6)").html());
                $("#last_name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(7)").html());
                
                $("#account_id").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(0)").html());
                $("#email").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(2)").html());
                $("#role_id").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(4)").html());
                $("#submit").html("Update");
            });

            // $(".remove").click(function () {
            //     $("#id2").val($(this).data('id'));
            //     $("#confirm").html("Are you sure you want to remove " + $(this).closest('tr').index() +") td:eq(0)").html() + "?");
            // });
        } );
    </script>

@endsection