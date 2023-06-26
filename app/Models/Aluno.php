<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_documento_id',
        'primeiro_nome',
        'ultimo_nome',
        'contacto_id',
        'avatar',
        'encarregado_id',
        'pais_id',
        'municipio_id',
        'provincia_id',
        'data_nascimento',
        'num_bilhete',
        'num_cedula',
        'reg_id',
        'email',
        'nomePai',
        'nomeMae',
        'banned_until',
        'status',
        'endereco',
        'genero_id',
        'user_id',
        'user_aluno_id'
    ];
}
