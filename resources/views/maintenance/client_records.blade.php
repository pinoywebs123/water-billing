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
                                <td>{{ $client->profile->first_name }} {{ $client->profile->middle_name }} {{ $client->profile->last_name }}</td>
                                <td>{{ $client->email }}</td>
                                <td hidden>{{ $client->role->id }}</td>
                                <td>
                                 
                                    <a href="{{route('maintenance_client_view_records',['id'=> $client->id])}}" class="btn btn-info btn-xs">View Records</a>
                                </td>
                            </tr>
    
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
       
    </div>

    
@endsection

@section('scripts')

    

@endsection