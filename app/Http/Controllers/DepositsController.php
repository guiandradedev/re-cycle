<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepositsRequest;
use App\Http\Requests\UpdateDepositsRequest;
use App\Models\Deposits;

class DepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepositsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Deposits $deposits)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deposits $deposits)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepositsRequest $request, Deposits $deposits)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deposits $deposits)
    {
        //
    }
}
