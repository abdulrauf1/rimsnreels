<?php

namespace App\Http\Controllers;

use App\Models\Products;
// use App\Http\Requests\StoreEmployeesRequest;
// use App\Http\Requests\UpdateEmployeesRequest;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('products.view', [
            'products' => Products::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('products.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'unit' => ['required', 'string', 'max:255'],
            // 'qty' => ['required'],
            'netRate' => ['required'],
        ]);

        
        $product = Products::create([
            'material' => $request->material?$request->material:'',
            'description' => $request->description,
            'unit' => $request->unit,            
            'netRate' => $request->netRate,
        ]);
     
        if($request->productId)
        {
           
            Products::where('id', $request->productId)->update(['active' => false]);   
            return redirect('products')->with('message', 'Product Record Updated Successfully!' );  
        }

        return redirect('products')->with('message', 'Product Record Added Successfully!' );

    }

    /**
     * Display the specified resource.
     */
    public function show(Products $Products)
    {
        //
    }


    public function editView(Request $request)
    {
        //
        
        return view('products.edit',[
            "product" => Products::where('id',$request->product)->first(),
        ]);
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        //
        dd($request->all());
        exit;

        return view('products.edit');
        
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateProductsRequest $request, Employees $employees)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Products::where('id',$id)->delete();
        return redirect('/products')->with('message', 'Product Deleted Successfully!' );
        
    }
}
