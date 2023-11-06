<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $fillable = [
        'id',
        'projeto_id',
        'membro_id',
        'created_at'
    ];

    // Defina o relacionamento entre a equipe e o projeto
    public function projeto()
    {
        return $this->belongsTo(Projeto::class, 'projeto_id'); // Substitua 'Projeto' pelo nome correto da classe do modelo de projeto
    }
    
    public function membro()
    {
        return $this->belongsTo(User::class, 'membro_id');
    }
}
