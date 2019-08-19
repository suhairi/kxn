<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;
use App\Supplier;
use Validator;
use Session;
use Carbon\Carbon;
use App\Stock;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::paginate(8);

        return view('inventory.index')->with('inventories', $inventories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();

        return view('inventory.create', ['suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return dd($request->all());

        $validator = Validator::make($request->all(), [
            'supplier_id'   => 'required',
            'date'          => 'required|date',
            'name.0'       => 'required|min:3',
            'quantity.0'   => 'required|integer',
            'price.0'      => 'required|regex:/^\d*(\.\d{2})?$/'
        ]);

        if ($validator->fails()) {
            return redirect('inventory/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        for($i=0; $i<5; $i++){

            if($i>0 && $request->name[$i] == "")
                break;

            $inventory = new Inventory;
            $inventory->supplier_id = $request->supplier_id;
            $inventory->date        = $request->date;
            $inventory->name        = $request->name[$i];
            $inventory->quantity    = $request->quantity[$i];
            $inventory->price       = $request->price[$i];
            $inventory->save();

            $stock = new Stock;
            $stock->name        = $request->name[$i];
            $stock->quantity    = $request->quantity[$i];
            $stock->save();
        }

        Session::flash('success', 'Inventory Record Success!');
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $inventory = Inventory::find($id);

        return view('inventory.edit', ['inventory' => $inventory, 'suppliers' => $suppliers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inventory = Inventory::find($id);
        $inventory->supplier_id = $request->supplier_id;
        $inventory->date        = $request->date;
        $inventory->name        = $request->name;
        $inventory->quantity    = $request->quantity;
        $inventory->price       = $request->price;
        $inventory->save();

        Session::flash('success', 'Inventory updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();

        Session::flash('success', 'Inventory Deleted!');

        return redirect()->back();
    }
}
