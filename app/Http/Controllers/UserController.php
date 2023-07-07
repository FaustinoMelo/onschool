<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pessoa;

class UserController extends Controller
{
    public function login(Request $request){

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

            // Cria um novo usuário com os dados validados
  
            $user = User::create([
                'primeiro_nome' => $data['primeiro_nome'],
                'ultimo_nome' => $data['ultimo_nome'],    
                'email' =>$data['email'],
                'password' =>$data['password'],
                'n_funcionario' =>$data['n_funcionario'],
                'formacao_academica' =>$data['formacao_academica'],
                'grau_academico' =>$data['grau_academico'],
                'n_carteira' =>$data['n_carteira'],
                'cargo_id' =>$data['cargo_id'],
                'dataInicio' =>$data['dataInicio'],
                'dataFim' =>$data['dataFim'],
                'visible' =>$data['visible'],
                'pessoa_id' =>$pessoa->id,
                'password' => bcrypt($data['password'])
            ]);
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
    public function me()
    {
        $user=auth()->user();
        return response()->json($user, 200);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
