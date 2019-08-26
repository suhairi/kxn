<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;
use App\Car;
use Session;
use Validator;
use App\Supplier;
use App\Inventory;

class SearchController extends Controller
{
    public function index() {
    	
    	return view('search.index');
    }

    public function show(Request $request) {

    	$validator = Validator::make($request->all(), [
            'plateNo'   => 'required|min:4',
        ]);

        if ($validator->fails()) {
            return redirect('search')
                        ->withErrors($validator)
                        ->withInput();
        }

    	$car = Car::where('plateNo', $request->plateNo)->first();

    	if($car == null) {

    		Session::flash('failed', 'Plate Number ' . $request->plateNo . ' not found!');

    		return redirect()->back();

    	}

    	$repairs = Repair::where('car_id', $car->id)->get();

    	return view('search.show')->with('repairs', $repairs);
    }

    public function inventory() {

        $suppliers      = Supplier::pluck('name', 'id');
        $inventories    = collect([]);

        // dd($inventories);

        return view('search.inventory', compact('suppliers', 'inventories'));
    }

    public function inventoryResult(Request $request) {

        $supplier       = Supplier::find($request->supplier_id);
        $suppliers      = Supplier::pluck('name', 'id');
        $inventories    = Inventory::where('supplier_id', $request->supplier_id)->groupBy('date')->get();


        if(empty($inventories->count())) {
            Session::flash('failed', 'Inventory with that Supplier not found!');
            return redirect()->back();
        }

        // dd($inventories);

        return view('search.inventory', compact('supplier', 'suppliers', 'inventories'));

        

    }


}
