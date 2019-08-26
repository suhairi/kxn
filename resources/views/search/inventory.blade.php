@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">Seacrh Inventory by Supplier</h6>
	    	</div>
	    	<div class="card-body">
	    		@include('layouts._ifError')
	    		@include('layouts._ifSuccess')
	    		@include('layouts._ifFailed')

	    		{{ Form::open(['route' => 'search.inventory', 'method' => 'POST']) }}
	    			<div class="form-group row">
	                  	<div class="col-sm-6 mb-3 mb-sm-0">
	                  		{{ Form::label("Supplier Search") }}
	                  		{{ Form::select("supplier_id", $suppliers, null, ['class' => 'form-control form-control-user', 'placeholder' => 'Select Supplier']) }}	                  		
	                  	</div>
	                </div>
	                <div class="form-group row">
	                	<div class="col-sm-2 mb-3 mb-sm-0">
	                		{{ Form::submit('Search Inventory', ['class' => 'btn btn-primary btn-user btn-block']) }}
	                   	</div>
	                </div>
	    		{{ Form::close() }}

	    		@if(!empty($inventories->count()))
	    			<hr />
	    			<table class="table table-bordered">
	    				<thead>
	    					<tr>
	    						<th>Search Result : {{ $supplier->name }}</th>
	    					</tr>
	    				</thead>
	    			@forelse($inventories as $inventory)
	    				<?php $items = App\Inventory::where('date', $inventory->date)->where('supplier_id', $inventory->supplier_id)->get(); ?>
	    				<tbody>
	    					<table class="table table-striped table bordered">
	    						<thead>
	    						<tr>
	    							<th>{{ Carbon\Carbon::parse($inventory->date)->format('d-m-Y') }}</th>
	    						</tr>
	    						</thead>
	    						<tbody>
	    							<tr>
	    								<th>Bill</th>
	    								<th>Item Name</th>
	    								<th>Quantity</th>
	    								<th>Price (RM)</th>
	    							</tr>
	    							@foreach($items as $item)
	    								<tr>
		    								<td>{{ $loop->iteration }}</td>
		    								<td>{{ $item->name }}</td>
		    								<td>{{ $item->quantity }}</td>
		    								<td>{{ $item->price }}</td>
	    								</tr>
	    							@endforeach
	    						</tbody>
	    					</table>
	    				</tbody>
    				@empty
    					<li>No Result</li>
	    			@endforelse
	    			</table>
	    		@endif

	    	</div>

	    </div>
	</div>
</div>

@endsection