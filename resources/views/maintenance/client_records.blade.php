@extends('maintenance.template')

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
                <table class="table table-hover" id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $r = 0; ?>
                            @foreach ($clients as $client)
                                <?php $r++; ?>
                            <tr>
                                <td>{{ $client->account_id }}</td>
                                <td>{{ $client->profile->first_name }} {{ $client->profile->middle_name }} {{ $client->profile->last_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td hidden>{{ $client->role->id }}</td>
                                <td hidden>{{ $client->profile->first_name }}</td>
                                <td hidden>{{ $client->profile->middle_name }}</td>
                                <td hidden>{{ $client->profile->last_name }}</td>
                                <td hidden>{{ $client->profile->address }}</td>
                                <td hidden>{{ $client->profile->city }}</td>
                                <td hidden>{{ $client->profile->province }}</td>
                                <td>
                                        <a class="edit btn btn-primary btn-xs" href="#" data-id="{{ $client->id }}" data-toggle="modal" data-target="#addeditmodal"> 
                                            <i class="menu-icon fa fa-edit"></i> Edit 
                                        </a>
        
                                        {{-- <a class="remove" href="#" data-row="{{ $r }}" data-id="{{ $client->id }}" data-toggle="modal" data-target="#removemodal"> 
                                            <i class="menu-icon fa fa-minus"></i> Remove 
                                        </a> --}}
    
                                        <a href="{{route('maintenance_client_view_records',['id'=> $client->id])}}" class="btn btn-info btn-xs">View Records</a>
                                        {{-- <a href="{{route('billing_client_lock',['id'=> $client->id])}}" class="btn btn-danger btn-xs">Lock</a> --}}
                                    </td>
                            </tr>
    
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>

    <div class="modal fade" id="addeditmodal" tabindex="-1" role="dialog" aria-labelledby="addeditmodalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="addedit_user" action="{{ route('maintenance_client_update') }}" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addeditmodalLabel">Update Client Information</h5>
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
                                        <input  class="form-control" id="address" type="string" name="address" placeholder="123 Street">
                                    </div>
                                    <div class="form-group">
                                        <input  class="form-control" id="city" type="string" name="city" placeholder="Cebu City">
                                    </div>
                                    <div class="form-group">
                                        <input  class="form-control" id="province" type="string" name="province" placeholder="Cebu">
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
        </div> --}}
        
@endsection
    
@section('scripts')

    <script type="text/javascript">
    $(document).ready( function () {
        $('#example').DataTable();

        $(".edit").click(function () {
            $("#id").val($(this).data('id'));
            $("#first_name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(4)").html());
            $("#middle_name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(5)").html());
            $("#last_name").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(6)").html());
            $("#address").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(7)").html());
            $("#city").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(8)").html());
            $("#province").val($("tr:eq(" + ($(this).closest('tr').index() + 1) +") td:eq(9)").html());
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