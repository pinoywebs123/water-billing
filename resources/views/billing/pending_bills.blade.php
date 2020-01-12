@extends('billing.template')

@section('styles')
    <style>
        td#answer { white-space:pre }
    </style>
@endsection

@section('contents')
	@include('shared.notif')
  <h3 class="text-center">List of all your customer pending request services</h3>
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
                <th>Actions</th>
                
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
                
                <form action="{{route('billing_approved_bills_submit',$req->id)}}" method="POST" id="form{{$req->id}}">
                  @csrf
                  <button class="btn btn-primary btn-xs approved" type="submit" data-toggle="modal" data-target="#appovedModal" value="{{$req->id}}">Approved</button>

                </form>
                <form action="{{route('billing_approved_bills_submit',$req->id)}}" method="POST">
                  @csrf
                  <button class="btn btn-danger btn-xs" type="submit">Declined</button>

                </form>
                
              </td>
            </tr>
          @endforeach
        </tbody>
        
        
    </table>


 <div id="appovedModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Informations!!!</h4>
      </div>
      <div class="modal-body">
        <h3>Are you sure want yo approved?</h3>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary approved_yes">Yes</button>
        
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div>   
@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable({
		"order": []
	});

    $('.approved').click(()=> {
      var id = $('.approved').val();
      
      $('.approved_yes').click(()=> {
        $( "#form"+id ).submit();
      })
    });
  } );
</script>
@endsection