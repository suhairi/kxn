@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">List of Cars/Customers</h6>
	    	</div>
	    	<div class="card-body">
	    		@include('layouts._ifSuccess')
	    		
	    		<table class="table table-bordered table-striped">
	    			<thead class="thead-dark">
	    				<tr>
	    					<th>Bil</th>
	    					<th>Owners' Name</th>
	    					<th>Plate No / Car Model</th>
	    					<th>Address</th>
	    					<th>Options</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach($cars as $car)
	    					<tr>
	    						<td>{{ $loop->iteration }}</td>
	    						<td><strong>{{ $car->owner }}</strong></td>
	    						<td>
	    							<strong>{{ $car->plateNo }}</strong> <br />
	    							{{ $car->model }}

	    						</td>
	    						<td>{{ $car->address }}</td>
	    						<td align="center">
					                <div class="inline">
		    							<a href="{{ route('car.edit', $car->id) }}" class="btn btn-primary">Edit</a>
		    							<a href="{{ route('car.destroy', $car->id)}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><button class="btn btn-danger">Delete</button></a>
					                </div>
	    						</td>
	    					</tr>
	    				@endforeach
	    				<tr>
	    					<td colspan="5" align="center">{{ $cars->links() }}</td>
	    				</tr>

	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>

@endsection