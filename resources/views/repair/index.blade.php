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
	    			<thead class="thead-dark">
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
	    							Invoice No. : {{ $repair->invoice->invoice_no }} <br />
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
	    							<table class="table table-bordered table-striped">
	    								<thead>
	    									<th>Item Name</th>
	    									<th>Quantity</th>
	    									<th>Price (RM)</th>
	    									<th><strong>Total (RM)</strong></th>
	    								</thead>
	    								@foreach($repair->rparts as $rpart)
	    									<tr>
	    										<td>{{ $rpart->name }}</td>
	    										<td>{{ $rpart->quantity }}</td>
	    										<td align="right">{{ $rpart->price }}</td>
	    										<td align="right">{{ $rpart->total }}</td>
	    									</tr>
	    								@endforeach
	    							</table>
	    							
	    						</td>
	    						<td align="center">
	    							<div class="inline">
		    							<a href="{{ route('repair.edit', $repair->id) }}" class="btn btn-primary">Edit</a>
		    							<a href="{{ route('repair.destroy', $repair->id)}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><button class="btn btn-danger">Delete</button></a>
		    							<a href="{{ route('printouts.invoice', $repair->id) }}" class="btn btn-success" target="_blank"><i class="fa fa-print" aria-hidden="true" title="Print Invoice"></i></a>
		    							<a href="#" class="btn btn-warning" target="_blank"><i class="fa fa-print" aria-hidden="true" title="Print D.O"></i></a>
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