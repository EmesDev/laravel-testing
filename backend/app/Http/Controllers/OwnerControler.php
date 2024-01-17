<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerControler extends Controller
{

    protected $owner;
    public function __construct()
    {
        $this->owner = new Owner();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->owner->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->owner->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $owner = $this->owner->find($id);

        if (!$owner) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return $owner;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $owner = $this->owner->find($id);

        if (!$owner) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $owner->fill($request->all());
        $owner->save();

        return $owner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $owner = $this->owner->find($id);

        if (!$owner) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $owner->delete();
    }
}
