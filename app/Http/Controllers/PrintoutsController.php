<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Repair;
use App\Rparts;

class PrintoutsController extends Controller
{
    public function invoice($id) {

    	$repair = Repair::find($id);
    	$rparts = Rparts::where('repair_id', $id)->get();

    	$data['repair']	= $repair->first();
    	$pages = ceil(count($data['repair']->rparts) / 8);

    	$parts = $repair->rparts->toArray();
    	// dd($parts);
    	// dd(count($parts));
    	// dd($pages);

    	$pdf = PDF::loadView('printouts.invoice', compact('data', 'pages', 'parts'))->setPaper('a4');
    	return $pdf->download($repair->car->owner . ' - ' . $repair->car->plateNo . $repair->dateIn . '.pdf');

    	return view('printouts.invoice', ['data' => $data, 'pages' => $pages, 'parts' => $parts]);
    }
}
