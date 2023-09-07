<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::all();

        return response()->json([
            'data' => $directions,
            'message' => 'Directions récupérées avec succès'
        ]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $direction = Direction::create([
            'name' => $request->name,
        ]);

        return redirect()->route('filing.plan');
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
        $direction = Direction::findOrFail(intval($id));

        return response()->json([
            'data' => $direction,
            'message' => 'Direction éditée avec succès'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $direction = Direction::findOrFail(intval($id));

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $direction->name = $request->name;
        $direction->save();

        return redirect()->route('filing.plan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
