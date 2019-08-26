@extends('layouts.admin')

@section('content')

<div class="container-fluid">

<div class="col-xl-12 col-lg-7">
	<div class="card shadow mb-4">

    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      		<h6 class="m-0 font-weight-bold text-primary">Edit Car Record</h6>
    	</div>
    	<div class="card-body">
    		@include('layouts._ifError')
	    	@include('layouts._ifSuccess')
        @include('layouts._ifFailed')

        <form class="user" method="post" action="{{ route('car.update', $car->id) }}">
    		@method('PATCH')
        @csrf
                <div class="form-group row">
                  	<div class="col-sm-6 mb-3 mb-sm-0">
                    	<input type="text" name="owner" class="form-control form-control-user" placeholder="Owner Name" value="{{ $car->owner }}">
                  	</div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <textarea type="text" name="address" class="form-control form-control-user" placeholder="Owner's Address'">{{ $car->address }}</textarea>
                    </div>
                </div>

                

                <div class="form-group row">
                  	<div class="col-sm-6 mb-3 mb-sm-0">
                    	<input type="text" class="form-control form-control-user" name="plateNo" placeholder="Plate No" value="{{ $car->plateNo }}">
                  	</div>
                </div>

                <div class="form-group row">
                  	<div class="col-sm-6 mb-3 mb-sm-0">
                    	<input type="text" class="form-control form-control-user" name="model" placeholder="Car Model (example: Proton Iswara)" value="{{ $car->model }}">
                  	</div>
                </div>

                <div class="form-group row">
                	<div class="col-sm-3 mb-3 mb-sm-0">
	                	<input type="submit" class="btn btn-primary btn-user btn-block" value="Update Record">	                  		
                	</div>
                </div>
  			</form>
    		

        </div>
    </div>
</div>
</div>


@endsection