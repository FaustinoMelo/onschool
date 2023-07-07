<?php

namespace App\Http\Controllers;

use App\Models\AlunoAccess;
use App\Models\Pessoa;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * 
     */
    public function login(Request $request){
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
       
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        $user = Auth::user();
        $token =$user->createToken('jwt');

        if(!$token){
            return response()->json('usuario invalido', 401);
        }
        return response()->json($token->plainTextToken);        
    }

    public function store(Request $request)
    {
       //return response()->json($request->json()->all(), 200);
         try{

            DB::beginTransaction();
           
            $data = $request->all();
            $user =auth()->user();

            $pessoa = Pessoa::create([
                'name'=> $data['name'],
                'contacto_id'=> $data['contacto_id'],
                'avatar'=> $data['avatar'],
                'pais'=> $data['pais'],
                'municipio_id'=> $data['municipio_id'],
                'provincia_id'=> $data['provincia_id'],
                'data_nascimento'=> $data['data_nascimento'],
                'num_bilhete'=> $data['num_bilhete'],
                'num_cedula'=> $data['num_cedula'],
                'n_passaport'=> $data['n_passaport'],
                'bairro'=> $data['bairro'],
                'genero_id'=> $data['genero_id'],
                //'user_funcionario_id'=> $user->id,
            ]);

            $user = AlunoAccess::crea2te([
                'email'=> $data['email'],
                'doc_certi_hab'=> $data['doc_certi_hab'],
                'doc_identificacao'=> $data['doc_identificacao'],
                'n_estudate'=> $data['n_estudate'],
                'primeiro_nome'=> $data['primeiro_nome'],
                'ultimo_nome'=> $data['ultimo_nome'],
                //'banned_until'=> $data['banned_until'],
                'status'=> $data['status'],
                'pessoa_id' => $pessoa->id,
                'password' => bcrypt($data['password'])
            ]);

            // Cria um novo aluno com os dados validados
            // $data['user_id'] = auth()->user()->id;
            

            DB::commit();

            return response()->json($user, 200);
        
        }catch(Exception $e){
            DB::rollback();
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
