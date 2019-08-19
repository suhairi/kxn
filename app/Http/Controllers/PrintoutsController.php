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
    	$pages = round(count($data['repair']->rparts) / 9, 0);

    	$pdf = PDF::loadView('printouts.invoice', compact('data', 'pages'))->setPaper('a4');
    	return $pdf->download($repair->car->owner . ' - ' . $repair->car->plateNo . $repair->dateIn . '.pdf');

    	return view('printouts.invoice', ['data' => $data]);
    }
}
