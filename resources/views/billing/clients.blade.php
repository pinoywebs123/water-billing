@extends('billing.template')

@section('styles')

    <style>
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #8e8e93 !important;
            opacity: 1 !important; /* Firefox */
        }
    </style>

@endsection

@section('contents')

    <h1>List of Clients</h1>
    @include('shared.notif')
    <div class="container">
        <div class="row">
            <div class="col">
                <table id="datatable" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th hidden></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $r = 0; ?>
                            @foreach ($clients as $client)
                                <?php $r++; ?>
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td hidden>{{ $client->role->id }}</td>
                                <td>
                                    <a class="edit btn btn-primary btn-xs" href="#" data-id="{{ $client->id }}" data-toggle="modal" data-target="#addeditmodal"> 
                                        <i class="menu-icon fa fa-edit"></i> Edit 
                                    </a>
    
                                    {{-- <a class="remove" href="#" data-row="{{ $r }}" data-id="{{ $client->id }}" data-toggle="modal" data-target="#removemodal"> 
                                        <i class="menu-icon fa fa-minus"></i> Remove 
                                    </a> --}}

                                    <a href="{{route('billing_client_view_records',['id'=> $client->id])}}" class="btn btn-info btn-xs">View Records</a>
                                    <a href="{{route('billing_client_lock',['id'=> $client->id])}}" class="btn btn-danger btn-xs">Lock</a>
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
                <form id="addedit_user" action="store" method="post">
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
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the username">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" id="email" type="string" name="email" placeholder="Enter the email">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" id="email" type="password" name="password" placeholder="Enter the password">
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

    <div class="modal fade" id="removemodal" tabindex="-1" role="dialog" aria-labelledby="removemodalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="remove_user" action="remove_user" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="removemodalLabel">Remove client</h5>
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
    </div>
    
@endsection

@section('scripts')

    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();

            $(".add").click(function () {
                $("#addeditmodal .modal-title").html("Add client");
                $("#addedit_user").attr("action", "{{ route('billing_create_client') }}");
                $("#name").val("");
                $("#email").val("");
                $("#submit").html("Add");
            });

            $(".edit").click(function () {
                $("#addeditmodal .modal-title").html("Edit staff");
                $("#addedit_user").attr("action", "{{ route('billing_client_update') }}");
                $("#id").val($(this).data('id'));
                $("#name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(0)").html());
                $("#email").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(1)").html());
                $("#submit").html("Update");
            });

            // $(".remove").click(function () {
            //     $("#id2").val($(this).data('id'));
            //     $("#confirm").html("Are you sure you want to remove " + $(this).closest('tr').index() +") td:eq(0)").html() + "?");
            // });
        } );
    </script>

@endsection