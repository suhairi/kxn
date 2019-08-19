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
	    		
	    		<table class="table table-bordered">
	    			<thead>
	    				<tr>
	    					<th>Bil</th>
	    					<th>Owners' Name</th>
	    					<th>Plate No</th>
	    					<th>Car Model/Make</th>
	    					<th>Options</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach($cars as $car)
	    					<tr>
	    						<td>{{ $loop->iteration }}</td>
	    						<td>{{ $car->owner }}</td>
	    						<td>{{ $car->plateNo }}</td>
	    						<td>{{ $car->model }}</td>
	    						<td align="center">
	    							<div class="inline">
		    							<a href="{{ route('car.edit', $car->id) }}" class="btn btn-primary">Edit</a>
		    							<form action="{{ route('car.destroy', $car->id)}}" method="post">
						                  @csrf
						                  @method('DELETE')
						                  <button class="btn btn-danger" type="submit">Delete</button>
						                </form>
					                </div>
	    						</td>
	    				@endforeach
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>

@endsection