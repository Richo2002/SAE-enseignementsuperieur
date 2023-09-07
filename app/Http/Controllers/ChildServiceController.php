<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ChildServiceController extends Controller
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
    public function store(Request $request, string $parentId)
    {
        $service = Service::findOrFail(intval($parentId));

        $service->children()->create([
            'name' => $request->name
        ]);

        /*return response()->json([
            'data' => $service,
            'message' => 'Service enfant ajouté avec succès'
        ]);*/
        return redirect()->route('filing.plan');
    }

    /**
     * Move a service to another service.
     */
    public function move(Request $request)
    {
        $childService = Service::findOrFail(intval($request->from));

        $parentService = Service::findOrfail(intval($request->to));

        $childService->appendToNode($parentService)->save();

        if ($childService->hasMoved()) {
            return response()->json([
                'message' => 'Service déplacé avec succès'
            ]);
        } else {
            return response()->json([
                'message' => 'Le déplacement du nœud a échoué.'
            ]);
        }
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
        $service = Service::findOrFail(intval($id));

        $service->delete();

        return response()->json([
            'message' => 'Le service a été supprimer avec succès.'
        ]);
    }
}
