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


	        	<form class="user" method="post" action="{{ route('car.store') }}">
	        	@csrf


              <table class="table table-bordered" id="dynamicTable">
                <tr>
                  <th colspan="3">Supplier</th>
                </tr>
                <tr>
                  <td colspan="3">
                    <select name="supplier_id" class="form-control col-sm-3">
                      <option>Choose Supplier</option>
                        @foreach($suppliers as $supplier)
                          <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>Item/Part Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control form-control-user" name="addmore[0]name" placeholder="Part Name" value="{{ old('name') }}"></td>
                  <td><input type="text" class="form-control form-control-user" name="addmore[0]quantity" placeholder="Quantity" value="{{ old('quantity') }}"></td>
                  <td><input type="text" class="form-control form-control-user" name="addmore[0]price" placeholder="Price" value="{{ old('price') }}"></td>
                  <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> 
                </tr>
              </table>

                <div class="form-group row">
                	<div class="col-sm-3 mb-3 mb-sm-0">
	                	<input type="submit" class="btn btn-primary btn-user btn-block" value="Record New Car/Customer">	                  		
                	</div>
                </div>
              </form>

	        </div>

    	</div>

    	

    </div>

	</div>

  <script type="text/javascript">
   
    var i = 0;
       
    $("#add").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input type="text" name="addmore['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="addmore['+i+'][quantity]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="addmore['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  
   
</script>

@endsection