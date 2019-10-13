@extends('admin.template')

@section('styles')

@endsection

@section('contents')
	<h1 class="text-center">Total Income Reports : P{{number_format($total)}}</h1>
  <form>
    <input type="date" name="start_date">
    <input type="date" name="end_date">
    <button type="submit">Generate</button>
  </form>
	<table id="example" class="table table-striped" style="width:100%">
    @include('shared.notif')
        <thead>
            <tr>
              	<th>Account ID</th>
            	<th>Customer</th>
                <th>Water Consumpton (cum)</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Bill</th>
                <th>Payment Status</th>
                <th>Date Created</th>
                
                
            </tr>
        </thead>
        <tbody>
          @foreach($paid as $un)
            <tr>
                <td>{{$un->user->account_id}}</td>
            	<td>{{$un->user->email}}</td>
              	<td>{{$un->water_consumption}}</td>
              	<td>{{$un->start_date}}</td>
              	<td>{{$un->end_date}}</td>
              	<td>{{$un->bill}}</td>
              	<td style="color: green">Paid</td>
              	<td>{{$un->created_at->toDayDateTimeString()}}</td>
              	

            </tr>
          @endforeach
        </tbody>
        
        
    </table>
@endsection

@section('scripts')
<script type="text/javascript">
 
</script>

@endsection