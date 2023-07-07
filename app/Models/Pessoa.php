<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;
    protected $table = "pessoa";
    
    protected $fillable = [
        'name',
        'contacto_id',
        'avatar',
        'pais',
        'municipio_id',
        'provincia_id',
        'data_nascimento',
        'num_bilhete',
        'num_cedula',
        'bairro',
        'n_passaport',
        'genero_id',
        'user_funcionario_id',
    ];
}
