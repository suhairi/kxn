<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repair;
use App\Car;
use Session;
use Validator;

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


}
