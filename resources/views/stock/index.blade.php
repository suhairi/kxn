@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">List of Inventories</h6>
	    	</div>
	    	<div class="card-body">
	    		@include('layouts._ifSuccess')
	    		
	    		<table class="table table-bordered">
	    			<thead>
	    				<tr>
	    					<th>Bil</th>
	    					<th>Item/Part Name</th>
	    					<th>Quantity</th>
	    				</tr>	    				
	    			</thead>
	    			<tbody>
	    				@foreach($stocks as $stock)
		    				<tr>
		    					<td>{{ $loop->iteration }}</td>
		    					<td>{{ $stock->name }}</td>
		    					<td>{{ $stock->quantity }}</td>
		    				</tr>
	    				@endforeach
	    			</tbody>

	    		</table>
	    	</div>
	    </div>
	</div>

@endsection