<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ParentServiceController extends Controller
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
    public function store(Request $request)
    {
        $service = Service::create([
            'name' => $request->name
        ]);

        return response()->json([
            'data' => $service,
            'message' => 'Service parent ajouté avec succès'
        ]);
    }

    /**
     * Move a service to another service.
     */
    public function move(Request $request)
    {
        app('App\Http\Controllers\ChildServiceController')->move($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        app('App\Http\Controllers\ChildServiceController')->destroy($id);
    }
}
