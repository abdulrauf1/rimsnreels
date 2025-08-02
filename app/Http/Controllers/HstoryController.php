<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\Quotations;
use App\Models\QuoatationsItems;
use App\Models\QuotationsAdditionalCosts;
use App\Models\QuotUsers;

use PDF;



class HstoryController extends Controller
{
    //

    public function index()
    {

        $quots = Quotations::paginate(15);

       
        return view('history.history', [
            'quots' => $quots,
        ]);
    }
}
