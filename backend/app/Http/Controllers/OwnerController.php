<?php
namespace App\Models\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $owners = Owner::all();
        return response()->json($owners);
    }

    //show the form for creating a new resource.
    public function show(Request $request)
    {
        $owner = Owner::find($request->CPF);
        return response()->json($owner);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "Name" => "required|string",
            "CPF" => "required|string",
            "Address" => "required|string",
            "Phone" => "required|string",
            "Email" => "required|string",
            "Data_of_Birth" => "required|integer",
        ]);

        $owner = Owner::create($validateData);

        return response()->json($owner, 201);

    }

    // Display the specified resource.
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            "Name" => "string",
            "Address" => "string",
            "Phone" => "string",
            "Email" => "string",
            "Data_of_Birth" => "integer",
        ]);

        $owner = Owner::find($id);
        $owner->fill($validateData);
        $owner->save();

        return response()->json($owner, 200);
    }

    //  Remove the specified resource from storage.
    public function destroy($CPF)
    {
        $owner = Owner::find($CPF);
        $owner->delete();

        return response()->json(null, 204);
    }


}