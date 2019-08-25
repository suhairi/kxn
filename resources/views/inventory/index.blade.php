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
	    		@include('layouts._ifFailed')
	    		
	    		<table class="table table-bordered">
	    			<thead>
	    				<tr>
	    					<th>Bil</th>
	    					<th>Supplier Name</th>
	    					<th>Date</th>
	    					<th>Options</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				@foreach($inventories as $supp => $inventory)
	    					<tr>
								<td>{{ $loop->iteration }}</td>
								<td></td>
								<td>
    								
								</td>
								<td>[ <a href="#"> edit </a> ] [ <a href="#"> delete </a> ]</td>
							</tr>
	    				@endforeach
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>

@endsection