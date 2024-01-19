<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


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
        // return $this->owner->all();
        // return DB::select('SELECT id as ID, name as Nome, cpf as CPF, address as Endereco, phone as Telefone, email as Email,  date  FROM owners');
        $owners = Owner::select('id', 'name', 'cpf', 'address', 'phone', 'email', 'date')->paginate(5);
        return response()->json($owners);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request['password'] = Hash::make($request['password']);

        $this->owner->create($request->all());

        $user = DB::select('SELECT id, name, cpf, address, phone, email, password, date, created_at  FROM owners where email = ?', [$request['email']]);

        return response()->json(
            [
                'message' => 'Proprietário cadastrado com sucesso',
                'usuario' => $user
            ],
            201
        );

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

        return DB::select('SELECT id, name, cpf, address, phone, email, date, created_at  FROM owners where id = ?', [$id]);
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

        return response()->json(
            [
                'message' => 'Proprietário atualizado com sucesso',
                'usuario' => DB::select('SELECT id, name, cpf, address, phone, email, date, created_at  FROM owners where id = ?', [$id])
            ],
            201
        );
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

        return response()->json([
            'message' => 'Proprietário removido com sucesso'
        ], 204);
    }

    
}
