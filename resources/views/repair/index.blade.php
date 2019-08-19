@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">Seacrh Repair Car</h6>
	    	</div>
	    	<div class="card-body">
	    		@include('layouts._ifSuccess')
	    		
	    		<table class="table table-bordered">
	    			<thead>
	    				<tr>
	    					<th>Bil</th>
	    					<th>Customer's Name</th>
	    					<th>Date In / Date Out</th>
	    					<th>Repair Details</th>
	    					<th>Options</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach($repairs as $repair)
	    					<tr>
	    						<td>{{ $loop->iteration }}</td>
	    						<td>
	    							<strong>{{ $repair->car->owner }}</strong> <br />
	    							{{ $repair->car->plateNo }}	<br />
	    							<strong>RM {{ $repair->grandTotal }} </strong> <br />
	    							@if($repair->status == 'PENDING')
	    								<font color="red">PAYMENT : {{ $repair->status}}</font>
	    							@else
	    								<font color="green">PAYMENT : {{ $repair->status}}</font>
	    							@endif			
	    						</td>
	    						<td>
	    							<strong>Date In : </strong>{{ Carbon\Carbon::parse($repair->dateIn)->format('d-m-Y - D') }} <br />
	    							<strong>Date Out : </strong>{{ Carbon\Carbon::parse($repair->dateOut)->format('d-m-Y - D') }}
	    						</td>
	    						<td>
	    							<table class="table">
	    								<thead>
	    									<th>Item Name</th>
	    									<th>Quantity</th>
	    									<th>Price</th>
	    									<th><strong>Total (RM)</strong></th>
	    								</thead>
	    								@foreach($repair->rparts as $rpart)
	    									<tr>
	    										<td>{{ $rpart->name }}</td>
	    										<td>{{ $rpart->quantity }}</td>
	    										<td>{{ $rpart->price }}</td>
	    										<td>{{ $rpart->total }}</td>
	    									</tr>
	    								@endforeach
	    							</table>
	    							
	    						</td>
	    						<td align="center">
	    							<div class="inline">
		    							<a href="{{ route('repair.edit', $repair->id) }}" class="btn btn-primary">Edit</a>
		    							<a href="{{ route('repair.destroy', $repair->id)}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><button class="btn btn-danger">Delete</button></a>
		    							<a href="{{ route('printouts.invoice', $repair->id) }}" class="btn btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
					                </div>
	    						</td>
	    				@endforeach
	    				<tr>
	    					<td align="center" colspan="6"></td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>

	    </div>
	</div>
</div>

@endsection