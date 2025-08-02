<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Quotations;
use App\Models\QuoatationsItems;
use App\Models\QuotationsAdditionalCosts;
use App\Models\QuotUsers;

use PDF;
use URL;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    public function index($token)
    {
        
        
        
        $quot = Quotations::where('id',$token)->first();

        if($quot->visited)
        {
           abort(401);
        }
        $user = QuotUsers::findOrFail($quot->user_id)->first();
        

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

        

        return view('quotations.costCalculator', [
            'products' => Products::where('active',true)->orderBy('id','desc')->get(),
            'costs' => $costs,
            'quot' => $quot,
            'user'  => $user
        ]);

    }

    public function store(Request $request)
    {
        
        
        $dataProducts = json_decode($request->input('dataProducts'), true);
        $dataCosts = json_decode($request->input('dataCosts'), true);

        Quotations::where('id', $request->quot_id)->update(['clientName' => $request->client,'visited' => 1]);
        
        
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
                'rate' => $dp['rate'],
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
        
       
       
        // return $pdf->download('itsolutionstuff.pdf');

        return view('quotations.addCostCalculated', [
            'quot_id' => $request->quot_id,
            'quot' => $quot,
            'user' => $user,
            'data' => $dataProducts,
            'dataCosts' => $dataCosts,
            'subTotal' => $subTotal,
            'mlCost' => ($subTotal/100)*60,
            'invoiceFor' => $request->client,
        ]);
    }
  
    public function download($id)
    {
        
        $quot = Quotations::where('id',$id)->get();
        $quotUser = QuotUsers::where('id', $quot[0]->user_id)->get();
        

        $subTotal = 0;
        
        $dataProducts = QuoatationsItems::where('quotation_id', $id)->get();
        
        foreach($dataProducts as $d)
        {
            $subTotal = $subTotal + ($d['rate']*$d['qty']);
        }

        $dataCosts = QuotationsAdditionalCosts::where('quot_id', $id)->get();

        $costTotal = 0;

        foreach($dataCosts as $c)
        {
            $costTotal = $costTotal + ($c['amount']);
        }

        $data = [
            'title' => 'Cost Calcultion',
            'client' => $quot[0]->clientName,
            'date' => $quot[0]->created_at,
            'user' => $quotUser[0]->name,
            'email' => $quotUser[0]->email,
            'address' => $quotUser[0]->address,
            'logo' => $quotUser[0]->logo,
            'subTotal' => $subTotal,
            'products' => $dataProducts,
            'costs' => $dataCosts,
            'costTotal' => $costTotal,
        ]; 
       
        
        $fileName = time().rand('9999','9999999').'.pdf';
        $pdf = PDF::loadView('quotations.myPDF', $data)->save("PDFs/".$fileName);

        Quotations::where('id', $id)->update(['pdfLink' => "PDFs/".$fileName]);

        $download = $pdf->download($fileName);
        $link = URL::temporarySignedRoute('quotations.downloaded', now()->addSeconds(10));

        return $download;
        

       
    }
    
    public function done()
    {
        return view('quotations.downloaded')->with('message','Thanks for using Cost Calculation with us.');

    }

}
