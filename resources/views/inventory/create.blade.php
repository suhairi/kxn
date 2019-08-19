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


        <!-- ################ -->
          <form class="user" method="post" action="{{ route('inventory.store') }}">
            @csrf


              <table class="table table-bordered" id="dynamicTable">
                <tr>
                  <th colspan="3">Supplier</th>
                </tr>
                <tr>
                  <td colspan="3">
                    <select name="supplier_id" class="form-control col-sm-3">
                      <option value="">Choose Supplier</option>
                        @foreach($suppliers as $supplier)
                          <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }} name="supplier_id">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    <br />
                    <input type="date" name="date" value="{{ old('date') }}" class="form-control col-sm-3" />
                  </td>
                </tr>
                <tr>
                  <th>Item/Part Name</th>
                  <th>Quantity</th>
                  <th>Cost Price/Unit </th>
                </tr>
                @for ($i=0; $i<5; $i++)               
                  <tr>
                    <td><input type="text" class="form-control form-control-user" name="name[{{ $i }}]" placeholder="Part Name" value="{{ old('name')[$i] }}"></td>
                    <td><input type="number" class="form-control form-control-user" name="quantity[{{ $i }}]" placeholder="Quantity" value="{{ old('quantity')[$i] }}"></td>
                    <td><input type="number" step="0.01" class="form-control form-control-user" name="price[{{ $i }}]" placeholder="Price" value="{{ old('price')[$i] }}"></td>
                  </tr>
                @endfor
              </table>

              <div class="form-group row">
                <div class="col-sm-3 mb-3 mb-sm-0">
                  <input type="submit" class="btn btn-primary btn-user btn-block" value="Record New Car/Customer">                        
                </div>
              </div>
          </form>

        <!-- ################ -->

            
      </div>
    </div>
  </div>
  </div>




@endsection