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

        $inventories = Inventory::all();
        $inventories = $inventories->unique('supplier_id');

        $collection = collect(['1' => 1, 'b' => 2]);

        foreach($inventories as $inventory) {
            $dates = Inventory::where()->get();
            
            $collection = $collection->push(['supplier_id' => $inventory->supplier_id]);
        }

 
        dd($collection);



        return view('inventory.index', compact('supplier', 'inventories', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::orderBy('name')->pluck('name', 'id');

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
            'date'          => 'required|date'
        ]);

        if ($validator->fails()) {
            return redirect('inventory/create')
                        ->withErrors($validator)
                        ->withInput();
        }

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

        for($i=0; $i<count($itemNameArray); $i++){

            $inventory              = new Inventory;
            $inventory->supplier_id = $request->supplier_id;
            $inventory->date        = $request->date;
            $inventory->name        = $itemNameArray[$i];
            $inventory->quantity    = $quantityArray[$i];
            $inventory->price       = $priceArray[$i];
            $inventory->save();
        }

        // #########################
        // Update stock here
        // But in the next version
        // #########################

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
