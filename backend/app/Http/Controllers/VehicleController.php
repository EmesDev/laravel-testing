<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{

    protected $vehicle;
    public function __construct()
    {
        $this->vehicle = new Vehicle();
    }

    public function index()
    {
        return $this->vehicle->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->vehicle->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = $this->vehicle->find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return $vehicle;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicle = $this->vehicle->find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $vehicle->fill($request->all());
        $vehicle->save();

        return $vehicle;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicle = $this->vehicle->find($id);

        if (!$vehicle) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $vehicle->delete();
    }
}
