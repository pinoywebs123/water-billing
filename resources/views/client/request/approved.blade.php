@extends('client.template')

@section('styles')
    <style>
        td#answer { white-space:pre }
    </style>
@endsection

@section('contents')
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Date Created</th>
                <th>Title</th>
                <th>Update</th>
                <th>Content</th>
                <th>Status</th>
                <th>Approved by</th>
                <th>Maintenance Working</th>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
              <td>{{$req->created_at->toDayDateTimeString()}}</td>
              <td>{{$req->title}}</td>
              <td id="answer">{{$req->answer}}</td>
              <td>{{$req->content}}</td>
              <td>{{$req->status->name}}</td>
              <td>{{ $req->biller->email }}</td>
              <td>
                @if($req->maintenance)
                  {{$req->maintenance->email}}
                @else
                  No working Maintenance
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