@extends('client.template')

@section('styles')

@endsection

@section('contents')
	<button class="btn btn-primary btn-xs" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Request</button>





<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Informations</h4>
      </div>
      <div class="modal-body">
       <form>
       		<div class="form-group">
       			<label>Request title</label>
       			<input type="text" name="title" class="form-control" placeholder="Ex: Water Pipe Damage Repair">
       		</div>
       		<div class="form-group">
       			<label>Request Reason/Content</label>
       			<textarea class="form-control" name="content" placeholder="Ex: Nasagasaan nang motor"></textarea>
       		</div>
       		<div class="form-group">
       			<button type="submit" class="btn btn-primary">Submit</button>
       		</div>
       </form>
      </div>
     
    </div>

  </div>
</div>	
@endsection

@section('scripts')

@endsection