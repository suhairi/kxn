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
	    					<th>Suppliers' Name</th>
	    					<th>Options</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach($suppliers as $supplier)
	    					<tr>
	    						<td>{{ $loop->iteration }}</td>
	    						<td>{{ $supplier->name }}</td>
	    						<td align="center">
	    							<div class="inline">
		    							<a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-primary">Edit</a>
		    							<a href="{{ route('supplier.destroy', $supplier->id)}}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><button class="btn btn-danger">Delete</button></a>
					                </div>
	    						</td>
	    				@endforeach
	    				<tr>
	    					<td colspan="3" align="center">{{ $suppliers->links() }}</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>

@endsection