@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	      		<h6 class="m-0 font-weight-bold text-primary">Edit Repair Status</h6>
	    	</div>

	    	@include('layouts._ifError')
          		@include('layouts._ifSuccess')

          		<div class="table-responsive">
      			{{ Form::open(['route' => ['repair.update', $repair->id], 'method' => 'PATCH', 'id' => 'dynamic_form']) }}
      			@csrf

      				<div class="form-group row">
	                  	<div class="col-sm-6 mb-3 mb-sm-0">
	                  		<font color="#FF6347"><strong>{{ Form::label("PENDING") }}</strong></font>
	                  		{{ Form::select("status", ['PENDING' => 'PENDING', 'DELIVERED' => 'DELIVERED / PAID'], $repair->status, ['class' => 'form-control form-control-user', 'placeholder' => 'Select Status']) }}
	                  	</div>
	                </div>
	                <hr />
      				<div class="form-group row">
	                  	<div class="col-sm-6 mb-3 mb-sm-0">
	                  		{{ Form::label("Date of Repair") }}
	                  		{{ Form::date("dateIn", Carbon\Carbon::parse($repair->dateIn)->format('Y-m-d'), ['class' => 'form-control form-control-user']) }}	                  		
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<div class="col-sm-6 mb-3 mb-sm-0">
	                  		{{ Form::select("car_id", $cars, $repair->car->id, ['class' => 'form-control form-control-user', 'placeholder' => 'Select Customer', 'id' => 'car_id']) }}
	                  	</div>
	                </div>
	                <div class="form-group row">
	                  	<div class="col-sm-6 mb-3 mb-sm-0">
	                  		{{ Form::label("Date of Release") }}
	                  		{{ Form::date("dateOut", Carbon\Carbon::parse($repair->dateOut)->format('Y-m-d'), ['class' => 'form-control form-control-user', 'placeholder' => 'Delivery Date']) }}	                  		
	                  	</div>
	                </div>
	                <br />
	                <hr />
	                <br />

	                <span id="result"></span>
	                    <table class="table table-bordered table-striped" id="user_table">
			            <thead>
			            	<tr>
			                	<th>Part/Item Name</th>
			                    <th>Quantity (Unit)</th>
			                    <th>Price Per Unit (RM)</th>
			                    <th>Action</th>
			                </tr>
			                @foreach($repair->rparts as $rpart)
			            		<tr>
			            			<td><input type="text" name="itemName[]" value="{{ $rpart->name }}" class="form-control" /></td>
			            			<td><input type="number" name="quantity[]" value="{{ $rpart->quantity }}" class="form-control" /></td>
			            			<td><input type="number" step="0.01" name="price[]" value="{{ $rpart->price }}" class="form-control" /></td>
			            			<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td>
			            		</tr>
			            	@endforeach	
		                </thead>                
			            <tbody>
			            	
			            </tbody>
			           	</table>
			        <div class="form-group row">
	                	<div class="col-sm-2 mb-3 mb-sm-0">
	                		{{ Form::submit('Update Repair Details', ['class' => 'btn btn-warning btn-user btn-block']) }}
	                   	</div>
	                </div>
			    {{ Form::close() }}
			   	</div>



		</div>
	</div>

	<script>
		$(document).ready(function(){

			var count = 1;

		 	dynamic_field(count);

			function dynamic_field(number){
			  	html = '<tr>';
			        html += '<td><input type="text" name="itemName[]" class="form-control" /></td>';
			        html += '<td><input type="number" name="quantity[]"  class="form-control" /></td>';
			        html += '<td><input type="number" step="0.01" name="price[]" value="" class="form-control" id="price[]" /></td>';
			        if(number > 1)
			        {
			            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
			            $('tbody').append(html);
			        }
			        else
			        {   
			            html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
			            $('tbody').html(html);
			        }
			}

			$(document).on('click', '#add', function(){
			  count++;
			  dynamic_field(count);
			});

			$(document).on('click', '.remove', function(){
			  count--;
			  $(this).closest("tr").remove();
			});

		});


		</script>
@endsection