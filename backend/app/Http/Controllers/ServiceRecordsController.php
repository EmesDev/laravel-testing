<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRecords;


class ServiceRecordsController extends Controller
{
    protected $service_records;
    public function __construct()
    {
        $this->service_records = new ServiceRecords();
    }

    public function index()
    {
        $records = ServiceRecords::select('id', 'vehicle_id', 'owner_id', 'service_date', 'service_description', 'cost')->paginate(5);

        return response()->json($records);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->service_records->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service_records = $this->service_records->find($id);

        if (!$service_records) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return $service_records;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service_records = $this->service_records->find($id);

        if (!$service_records) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $service_records->fill($request->all());
        $service_records->save();

        return $service_records;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service_records = $this->service_records->find($id);

        if (!$service_records) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $service_records->delete();
    }
}
