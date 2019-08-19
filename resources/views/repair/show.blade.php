@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">Seacrh Repair Car</h6>
	    	</div>
	    	<div class="card-body">
	    		{{ Form::open(['route' => 'repair.search', 'method' => 'POST']) }}
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

	    </div>
	</div>
</div>

@endsection