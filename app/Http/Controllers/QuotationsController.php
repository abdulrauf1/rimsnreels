<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Quotations;
use App\Models\QuoatationsItems;
use App\Models\QuotationsAdditionalCosts;
use App\Models\QuotUsers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Pdf;

class QuotationsController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costs = array('Supervision and certification of installation',
                        'Imported soil test',
                        'Percolation test',
                        'Separation of Foul and Surface water',
                        'Disposal of per area',
                        'WAC analysis',
                        'Making ground good',
                        'Desludge of tank',
                        'Decommission of existing tank',
                        'Replacement of old pipe work',
                        'Service of WWTP',
                        'Repairs to existing WWTP and pump chamber',
                        'Tarmac repair',
                        'Surface water Soakaway install',
                        'Toe Drains',
                        'Labour',
                        'Machinery',
                        'Insurance',
                        'health care facilities'
                    );

   
        return view('quotations.view', [
            'products' => Products::all(),
            'costs' => $costs,
        ]);
    }


    public function store(Request $request)
    {
        
        
        $dataProducts = json_decode($request->input('dataProducts'), true);
        $dataCosts = json_decode($request->input('dataCosts'), true);

        Quotations::where('id', $request->quot_id)->update(['clientName' => $request->client]);
        
        
        $subTotal = 0;
        foreach($dataProducts as $d)
        {
            $subTotal = $subTotal + ($d['rate']*$d['qty']);
        }

        
       
        foreach($dataProducts as $dp)
        {
            QuoatationsItems::create([
                'material' => '',
                'material_id' => 0,
                'description' => $dp['description'],
                'unit' => $dp['unit'],
                'qty' => $dp['qty'],
                'rate' => $dp['price'],
                'quotation_id' => $request->quot_id,
            ]);            
        }

        if($dataCosts !== null)
        {
            foreach($dataCosts as $dc)
            {
                QuotationsAdditionalCosts::create([
                    'costFor' => $dc['costs'],
                    'amount' => $dc['amount'],
                    'quot_id' => $request->quot_id,                
                ]);            
            }
        
        }
        
        $quot = Quotations::findOrFail($request->quot_id)->first();

        $user = QuotUsers::findOrFail($quot->user_id)->first();
        

        return view('quotations.add', [
            'quot' => $quot,
            'user' => $user,
            'data' => $dataProducts,
            'dataCosts' => $dataCosts,
            'subTotal' => $subTotal,
            'mlCost' => ($subTotal/100)*60,
            'invoiceFor' => $request->client,
        ]);
    }
  
    public function store1(Request $request)
    {
        $qData = json_decode($request->input('qData'), true);
        $subTotal = json_decode($request->input('subTotal'), true);
        $mlcost = json_decode($request->input('mlcost'), true);
        
        $addCosts = json_decode($request->input('data'), true);
        $data = [
            'qData' => $qData,
            'subTotal' => $subTotal,
            'mlCost' => $mlcost,
            'additionalCosts' => $addCosts
        ];
        
        return view('quotations.quotation', [
            'data' => $data,
            
        ]);
        
    }

    
}
