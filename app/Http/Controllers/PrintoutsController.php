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
    	// $data['rparts'] = $rparts;

    	// dd($data);

    	$pdf = PDF::loadView('printouts.invoice', compact('data'));
    	return $pdf->download($repair->car->owner . ' - ' . $repair->car->plateNo . $repair->dateIn . '.pdf');

    	return view('printouts.invoice', ['data' => $data]);
    }
}
