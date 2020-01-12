@extends('billing.template')

@section('styles')
    <style>
        td#answer { white-space:pre }
    </style>
@endsection

@section('contents')
	<h3 class="text-center">List of all your approved request services</h3>
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date Created</th>
                <th>Account ID</th>
                <th>Full Name</th>
                <th>Title</th>
                <th>Update info</th>
                <th>Content</th>
                <th>Status</th>
                <th>Maintenance</th>
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
              <td>{{$req->created_at->toDayDateTimeString()}}</td>
              <td>{{$req->user->account_id}}</td>
              <td>{{ $req->user->profile->first_name }} {{ $req->user->profile->middle_name }} {{ $req->user->profile->last_name }}</td>
              <td>{{$req->title}}</td>
              <td id="answer">{{$req->answer}}</td>
              <td>{{$req->content}}</td>
              <td>{{$req->status->name}}</td>
              <td>
                    @if($req->maintenance)
                      {{$req->maintenance->email}}
                    @else
                      No Maintenance
                    @endif
              </td>
            </tr>
          @endforeach
        </tbody>
        
        
    </table>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
		"order": []
	});
  } );
</script>
@endsection