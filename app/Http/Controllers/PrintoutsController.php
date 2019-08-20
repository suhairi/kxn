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
        // dd($repair);

    	$rparts = Rparts::where('repair_id', $id)->get();

    	$data['repair']	= $repair;
    	$pages = ceil(count($data['repair']->rparts) / 8);
        $printouts_title = 'invoice';

        // dd($data['repair']);

    	$parts = $repair->rparts->toArray();

    	$pdf = PDF::loadView('printouts.invoice', compact('data', 'pages', 'parts', 'printouts_title'))->setPaper('a4');
    	return $pdf->download($repair->car->owner . ' - ' . $repair->car->plateNo . $repair->dateIn . '.pdf');

    	return view('printouts.invoice', ['data' => $data, 'pages' => $pages, 'parts' => $parts]);
    }

    public function do($id) {
        $repair = Repair::find($id);
        // dd($repair);

        $rparts = Rparts::where('repair_id', $id)->get();

        $data['repair'] = $repair;
        $pages = ceil(count($data['repair']->rparts) / 8);
        $printouts_title = 'do';

        // dd($data['repair']);

        $parts = $repair->rparts->toArray();

        $pdf = PDF::loadView('printouts.invoice', compact('data', 'pages', 'parts', 'printouts_title'))->setPaper('a4');
        return $pdf->download($repair->car->owner . ' - ' . $repair->car->plateNo . $repair->dateIn . '.pdf');

        return view('printouts.invoice', ['data' => $data, 'pages' => $pages, 'parts' => $parts]);
    }
}
