@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">Seacrh Repair Car</h6>
	    	</div>
	    	<div class="card-body">
	    		{{ Form::open(['route' => 'search.search', 'method' => 'POST']) }}
	    			<div class="form-group row">
	                  	<div class="col-sm-6 mb-3 mb-sm-0">
	                  		{{ Form::label("Search Plate No") }}
	                  		{{ Form::text("plateNo", '', ['class' => 'form-control form-control-user', 'placeholder' => 'Plate No']) }}
	                  	</div>
	                </div>
	                <div class="form-group row">
	                	<div class="col-sm-2 mb-3 mb-sm-0">
	                		{{ Form::submit('Search Repair Car', ['class' => 'btn btn-primary btn-user btn-block']) }}
	                   	</div>
	                </div>
	    		{{ Form::close() }}
	    	</div>

	    	<div class="card-body">
	    		<div class="form-group row">
	    			<table class="table table-borderless">
	    				<thead class="thead-dark">
	    					<th>Bil</th>
	    					<th>Date</th>
	    					<th>Grand Total (RM)</th>
	    					<th>Status</th>
	    					<th>Details</th>
	    					<th>Options</th>
	    				</thead>
	    				<tbody>
	    					@foreach($repairs as $repair)
	    					<tr>
	    						<td>{{ $loop->iteration }}</td>
	    						<td>
	    							<a href="{{ route('repair.edit', $repair->id) }}"> {{ Carbon\Carbon::parse($repair->dateIn)->format('d-m-Y') }} 
	    							- {{ Carbon\Carbon::parse($repair->dateIn)->format('D') }}</a>
	    							<br />
	    							{{ $repair->car->owner }} <br />
	    							{{ $repair->car->plateNo }}
	    						</td>
	    						<td>{{ $repair->grandTotal }}</td>
	    						<td>
	    							@if($repair->status == 'PENDING')
	    								<font color="red"><strong>{{ $repair->status }}</strong></font>
    								@else
    									<font color="green">{{ $repair->status }}</font>
									@endif

	    						</td>
	    						<td>
	    							<table class="table table-striped">
	    								<thead>
	    									<th>Bil</th>
	    									<th>Item Name</th>
	    									<th>Quantity</th>
	    									<th>Price</th>
	    									<th><strong>Total (RM)</strong></th>
	    								</thead>
	    								@foreach($repair->rparts as $rpart)
	    									<tr>
	    										<td>{{ $loop->iteration }}</td>
	    										<td>{{ $rpart->name }}</td>
	    										<td>{{ $rpart->quantity }}</td>
	    										<td>{{ $rpart->price }}</td>
	    										<td>{{ $rpart->total }}</td>
	    									</tr>
	    								@endforeach
	    							</table>	    							
	    						</td>
	    						<td align="center">
	    							<a href="{{ route('printouts.invoice', $repair->id) }}" class="btn btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true" title="Print Invoice"></i></a>
		    							<a href="#" class="btn btn-warning" target="_blank"><i class="fa fa-print" aria-hidden="true" title="Print D.O"></i></a>
	    						</td>
	    					</tr>
	    					@endforeach
	    				</tbody>
	    			</table>


	    		</div>
	    	</div>

	    </div>
	</div>
</div>

@endsection