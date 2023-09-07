<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Direction;
use Illuminate\Http\Request;

class ParentServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $directionId)
    {
        $services = Service::where('direction_id', $directionId)->get();

        return redirect()->route('filing.plan');
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
    public function store(Request $request, $directionId)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Direction::findOrFail(intval($directionId));

        $service = Service::create([
            'name' => $request->name,
            'direction_id' => intval($directionId),
        ]);

        return redirect()->route('filing.plan');
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
    public function edit(int $id)
    {
        $service = Service::findOrFail(intval($id));

        return response()->json([
            'data' => $service,
            'message' => 'Service édité avec succès'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $service = Service::findOrFail(intval($id));

        $service->name = $request->name;
        $service->save();

        return redirect()->route('filing.plan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        app('App\Http\Controllers\ChildServiceController')->destroy($id);
    }
}
