@extends('layouts.admin')

@section('content')

	<div class="container-fluid">

	<div class="col-xl-12 col-lg-7">
		<div class="card shadow mb-4">

    	<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      		<h6 class="m-0 font-weight-bold text-primary">New Inventory/ Car Parts</h6>
    	</div>
    	<div class="card-body">

    		@include('layouts._ifError')
        @include('layouts._ifSuccess')
        @include('layouts._ifFailed')


        <!-- ################ -->
          {{ Form::open(['route' => 'inventory.store', 'method' => 'POST', 'id' => 'dynamic_form']) }}

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  {{ Form::label("Date of Repair") }}
                  {{ Form::date("date", \Carbon\Carbon::now()->format('Y-m-d'), ['class' => 'form-control form-control-user']) }}                       
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  {{ Form::label("Supplier") }}
                  {{ Form::select("supplier_id", $suppliers, null, ['class' => 'form-control form-control-user', 'placeholder' => 'Select Supplier']) }}                       
                </div>
            </div>
            
            <table class="table table-bordered table-striped" id="user_table">
              <thead>
                <tr>
                    <th>Part/Item Name</th>
                      <th>Quantity (Unit)</th>
                      <th>Cost Price Per Unit (RM)</th>
                      <th>Action</th>
                  </tr>
                </thead>
              <tbody>
              </tbody>
            </table>

            <div class="form-group row">
              <div class="col-sm-3 mb-3 mb-sm-0">
                <input type="submit" class="btn btn-primary btn-user btn-block" value="Record New Inventory">
              </div>
            </div>
          {{ Form::close() }}

        <!-- ################ -->

            
      </div>
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
              html += '<td><input type="number" name="quantity[]" class="form-control" id="quantity[]" /></td>';
              html += '<td><input type="number" step="0.01" name="price[]" class="form-control" id="price[]" /></td>';
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