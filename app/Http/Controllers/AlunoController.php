<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\User;
use Illuminate\Http\Request;

class AlunoController extends Controller
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
    public function store(Request $request)
    {

        try{
            // Valida os dados do aluno
            /*$request->validate([
                'tipo_documento_id' => 'required|integer',
                'primeiro_nome' => 'required|string',
                'ultimo_nome' => 'required|string',
                'contacto_id' => 'required|integer',
                'avatar' => 'nullable|image',
                'encarregado_id' => 'required|integer',
                'pais_id' => 'required|integer',
                'municipio_id' => 'required|integer',
                'provincia_id' => 'required|integer',
                'data_nascimento' => 'required|date',
                'num_bilhete' => 'nullable|string',
                'num_cedula' => 'nullable|string',
                'reg_id' => 'nullable|string',
                'email' => 'required|string|email|unique:alunos,email',
                'nomePai' => 'nullable|string',
                'nomeMae' => 'nullable|string',
                'banned_until' => 'nullable|date',
                'status' => 'required|boolean',
                'endereco' => 'nullable|string',
                'genero_id' => 'required|integer',
                'user_id' => 'required|integer',
            ]); */

            $data = $request->json()->all();
             // Cria um novo usuário com os dados validados

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'perfil_id' => 1,
                'password' => bcrypt($data['num_bilhete'])
            ]);

            // Cria um novo aluno com os dados validados
            $data['user_id'] = auth()->user()->id;
            $data['user_aluno_id'] = $user->id;

            $student = Aluno::create($data);
            return response()->json($student, 200);
        
        }catch(Exception $e){
            return response()->json('falha ao registrar aluno '.$e->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
