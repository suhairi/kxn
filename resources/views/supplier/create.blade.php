@extends('layouts.admin')

@section('content')

<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

	    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">New Supplier Record</h6>
	    	</div>
	    	<div class="card-body">

	    		@include('layouts._ifError')
          		@include('layouts._ifSuccess')


          		<form class="user" method="post" action="{{ route('supplier.store') }}">
	        	@csrf
                <div class="form-group row">
                  	<div class="col-sm-6 mb-3 mb-sm-0">
                    	<input type="text" name="name" class="form-control form-control-user" placeholder="Supplier Name (Example: KS Xin Trading)" value="{{ old('name') }}">
                  	</div>
                </div>

                <div class="form-group row">
                	<div class="col-sm-3 mb-3 mb-sm-0">
	                	<input type="submit" class="btn btn-primary btn-user btn-block" value="Record New Supplier">	                  		
                	</div>
                </div>

    		</div>
		</div>	
	</div>
</div>



@endsection