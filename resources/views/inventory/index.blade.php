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
								<td>{{ $inventory->supplier->name }}</td>
								<td>
									<?php $dates = App\Inventory::where('supplier_id', $inventory->supplier_id)->groupBy('date')->get('date'); ?>
									@foreach($dates as $date)

										<?php $items = App\Inventory::where('date', $date->date)->where('supplier_id', $inventory->supplier_id)->get(); ?>

										<table class="table">

											
											<thead class="thead-dark">
												<tr>
													<td colspan="4"><strong>{{ $loop->iteration }} - {{ Carbon\Carbon::parse($date->date)->format('d-m-Y') }}</strong></td>
												</tr>
												<tr>
													<th>Bil</th>
													<th>Item Name</th>
													<th>Quantity</th>
													<th>Price (RM)</th>
												</tr>
											</thead>
										@foreach($items as $item)
											<tr>
												<td>{{ $loop->iteration }}</td>
												<td>{{ $item->name }}</td>
												<td>{{ $item->quantity }}</td>
												<td>{{ $item->price }}</td>
											</tr>
										@endforeach
										</table>


									@endforeach
    								
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