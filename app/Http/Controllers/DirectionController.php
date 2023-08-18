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
            'archivist_id' => ['required'],
        ]);

        User::findOrFail(intval($request->archivist_id));

        $direction = Direction::create([
            'name' => $request->name,
            'archivist_id' => intval($request->archivist_id),
        ]);

        return response()->json([
            'data' => $direction,
            'message' => 'Direction ajoutée avec succès'
        ]);
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
            'archivist_id' => ['required'],
        ]);

        User::findOrFail(intval($request->archivist_id));

        $direction->name = $request->name;
        $direction->archivist_id = intval($request->archivist_id);
        $direction->save();

        return response()->json([
            'data' => $direction,
            'message' => 'Direction modifiée avec succès'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
