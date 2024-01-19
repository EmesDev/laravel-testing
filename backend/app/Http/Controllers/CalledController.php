<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Called;

class CalledController extends Controller
{
    protected $called;
    public function __construct()
    {
        $this->called = new Called();
       
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return $this->called->all();
        $called = Called::select('id', 'owner_id', 'title', 'description')->paginate(5);
        return response()->json($called);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->called->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $called = $this->called->find($id);

        if (!$called) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return $called;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $called = $this->called->find($id);

        if (!$called) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $called->fill($request->all());
        $called->save();

        return $called;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $called = $this->called->find($id);

        if (!$called) {
            return response()->json([
                'message' => 'Proprietário não encontrado'
            ], 404);
        }

        $called->delete();
    }
}
