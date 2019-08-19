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
	    					<th>Supplier Name</th>
	    					<th>Item/Part Name</th>
	    					<th>Quantity</th>
	    					<th align="center">Price (RM)</th>
	    					<th>Options</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach($inventories as $inventory)
	    					<tr>
	    						<td>{{ $loop->iteration }}</td>
	    						<td>{{ $inventory->supplier->name }}</td>
	    						<td>{{ $inventory->name }}</td>
	    						<td>{{ $inventory->quantity }}</td>
	    						<td align="right">{{ $inventory->price }}</td>
	    						<td align="center">
	    							<div class="inline">
		    							<a href="{{ route('inventory.edit', $inventory->id) }}" class="btn btn-primary">Edit</a>
		    							<a href="{{ route('inventory.destroy', $inventory->id)}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><button class="btn btn-danger">Delete</button></a>
					                </div>
	    						</td>
	    				@endforeach
	    				<tr>
	    					<td align="center" colspan="6">{{ $inventories->links() }}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>

@endsection