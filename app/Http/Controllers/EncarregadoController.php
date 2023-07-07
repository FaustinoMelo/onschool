<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EncarregadoAccess;


class EncarregadoController extends Controller
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
        // Valida os dados de cadastro
       /* $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);*/

        // Cria um novo usuário com os dados validados
        $data = $request->all();
        $user = EncarregadoAccess::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    
        return response()->json($user,200);
           
    }

    /**
     * Display the specified resource.
     */
    public function me()
    {
        $user=auth()->user();
        return response()->json($user, 200);
    }

    public function edit(Encarregado $encarregado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Encarregado $encarregado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Encarregado $encarregado)
    {
        //
    }
}
