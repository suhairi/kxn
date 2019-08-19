<?php

namespace App\Http\Controllers;

use App\Repair;
use Illuminate\Http\Request;
use App\Car;
use App\Invoice;
use App\Rparts;
use Session;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs = Repair::orderBy('dateIn', 'asc')->get();

        return view('repair.index', compact('repairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::orderBy('plateNo', 'asc')->pluck('plateNo', 'id');
        

        return view('repair.create')->with('cars', $cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        // VALIDATION HERE


        // END VALIDATION

        $repair = new Repair;
        $repair->dateIn     = $request->dateIn;
        $repair->dateOut    = $request->dateOut;
        $repair->car_id     = $request->car_id;
        $repair->status     = 'PENDING';
        $repair->grandTotal = '0.00';
        $repair->save();

        $grandTotal = 0;
        for($i=0; $i<count($request->itemName); $i++){

            $total              = $request->quantity[$i] * $request->price[$i];
            $rparts             = new Rparts;
            $rparts->repair_id  = $repair->id;
            $rparts->name       = $request->itemName[$i];
            $rparts->quantity   = $request->quantity[$i];
            $rparts->price      = $request->price[$i];
            $rparts->total      = $total;
            $rparts->save();

            $grandTotal         += $total;
        }

        $repair->grandTotal     = $grandTotal;
        $repair->save();

        Session::flash('success', 'Success!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show()';
    }

    public function search(Request $request) 
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repair = Repair::find($id);
        $cars = Car::orderBy('plateNo', 'asc')->pluck('plateNo', 'id');

        return view('repair.edit', compact('repair', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();

        // VALIDATION HERE


        // END VALIDATION

        $repair = Repair::find($id);
        $repair->dateIn     = $request->dateIn;
        $repair->dateOut    = $request->dateOut;
        $repair->car_id     = $request->car_id;
        $repair->status     = $request->status;
        $repair->grandTotal = '0.00';
        $repair->save();

        Rparts::where('repair_id', $id)->delete();

        // Stripping out null values from dynamic form

        $itemNameArray  = $request->itemName;
        $quantityArray  = $request->quantity;
        $priceArray     = $request->price;

        foreach($itemNameArray as $key => $value)          
            if(empty($value)) 
                unset($itemNameArray[$key]);

        foreach($quantityArray as $key => $value)          
            if(empty($value)) 
                unset($quantityArray[$key]);

        foreach($priceArray as $key => $value)          
            if(empty($value)) 
                unset($priceArray[$key]);

        // Inserting rparts records
        $grandTotal = 0;
        for($i=0; $i<count($itemNameArray); $i++){

            $total              = $quantityArray[$i] * $priceArray[$i];

            $rparts             = new Rparts;
            $rparts->repair_id  = $repair->id;
            $rparts->name       = $itemNameArray[$i];
            $rparts->quantity   = $quantityArray[$i];
            $rparts->price      = $priceArray[$i];
            $rparts->total      = $total;
            $rparts->save();

            $grandTotal         += $total;
        }

        $repair->grandTotal     = $grandTotal;
        $repair->save();

        Session::flash('success', 'Success!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        //
    }
}
