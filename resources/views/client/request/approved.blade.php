@extends('client.template')

@section('styles')

@endsection

@section('contents')
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Approved by</th>
                <th>Maintenance Working</th>
                <th>Date Created</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
              <td>{{$req->title}}</td>
              <td>{{$req->content}}</td>
              <td>{{$req->status->name}}</td>
              <td>{{$req->biller->email}}</td>
              <td>
                @if($req->maintenance)
                  {{$req->maintenance->email}}
                @else
                  No working Maintenance
                @endif
              </td>
              <td>{{$req->created_at->toDayDateTimeString()}}</td>
            </tr>
          @endforeach
        </tbody>
        
        
    </table>
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
@endsection