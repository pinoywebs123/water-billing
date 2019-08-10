@extends('billing.template')

@section('styles')

@endsection

@section('contents')
	<h3 class="text-center">List of all your approved request services</h3>
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Title</th>
                <th>Content</th>
                <th>Status</th>
                <th>Date Created</th>
                <th>Maintenance</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($all_request as $req)
            <tr>
              <td>{{$req->user->email}}</td>
              <td>{{$req->title}}</td>
              <td>{{$req->content}}</td>
              <td>{{$req->status->name}}</td>
              <td>{{$req->created_at->diffForHumans()}}</td>
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
    $('#example').DataTable();
  } );
</script>
@endsection