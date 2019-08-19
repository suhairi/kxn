<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Carbon\Carbon;
use App\Stock;

class StockController extends Controller
{
    
    public function index() {

    	$stocks = Stock::all();

    	return view('stock.index')->with('stocks', $stocks);
    }
}
