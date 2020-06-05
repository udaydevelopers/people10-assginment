<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\LineItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax()){
           $request->validate([
                'description.*' => 'required',
                'unit_price.*' => 'required',
                'quantity.*' => 'required',
                'sub_total.*' => 'required',
            ]);

        //    if($error->fails()){
        //      return response()->json([
        //         'error' => $error->errors->all(),
        //      ]) ; 
        //    }
           $name = $request->name;
           $address = $request->address;
           $due_date = $request->due_date;
           $description = $request->description;
           $unit_price = $request->unit_price;
           $quantity = $request->quantity;
           $sub_total = $request->sub_total;
           
           $invoice = Invoice::insertGetId([
            'name' => $name, 
            'address' => $address, 
            'payment_due_date' => $due_date
            ]);

           for($count = 0; $count < count($description); $count++)
           {
               $data = array(
                   'invoice_id' => $invoice,
                   'description' => $description[$count],
                   'unit_price' => $unit_price[$count],
                   'quantity' => $quantity[$count],
                   'sub_total' => $sub_total[$count],
               );
               $insert_data[] = $data;
           }
          
            LineItem::insert($insert_data);
            return response()->json([
                'success' => 'Data added successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function show(Inovice $inovice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function edit(Inovice $inovice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inovice $inovice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inovice  $inovice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inovice $inovice)
    {
        //
    }
}
