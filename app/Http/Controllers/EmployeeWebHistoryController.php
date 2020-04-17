<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Employee;
use App\EmployeeWebHistory;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeWebHistoryResource;

class EmployeeWebHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$query = EmployeeWebHistory::get()->groupBy('ip_address');
       return EmployeeWebHistoryResource::collection(Employee::all());
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ip_address)
    {
         $employees_web_history = Employee::where('ip_address',$ip_address)->get();
        return EmployeeWebHistoryResource::collection($employees_web_history);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
