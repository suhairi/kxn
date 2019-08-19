<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;
use Session;
use Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all()->sortBy('owner');
        // $cars = $cars->orderBy('owner', 'asc');
     
        return view('car.index')->with('cars', $cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'owner' => 'required|max:255',
            'plateNo' => 'required|unique:car,plateNo',
            'model' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect('car/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        Session::flash('success', 'Success!');

        Car::create([
            'owner'     => $request->owner,
            'plateNo'   => $request->plateNo,
            'model'     => $request->model,
        ]);

        return redirect('car/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        echo 'Controller Car->show';

        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit($car)
    {
        
        $car = Car::find($car);

        return view('car.show')->with('car', $car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'owner' => 'required|max:255',
            'plateNo' => 'required|unique:car,plateNo',
            'model' => 'nullable',

        ]);

        if ($validator->fails()) {
            return redirect('car/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $car = Car::find($id);

        $car->owner = $request->owner;
        $car->plateNo = $request->plateNo;
        $car->model = $request->model;
        $car->save();

        Session::flash('success', 'Success!');

        return redirect('car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        Session::flash('success', 'Delete Success!');

        return redirect()->back();
    }
}
