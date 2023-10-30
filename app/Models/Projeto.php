<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'cliente_id',
        'titulo',
        'descricao',
        // 'categoria',
        'orcamento',
        // 'status',
        'prazo',
        'qtdprestadores'
        // 'habilidades_necessarias',
        // 'numero_membros_equipe_desejado',
        // 'cargos_equipe_desejados',
        // Outros campos específicos do Projeto
    ];

    // public function cliente()
    // {
    //     return $this->belongsTo(Cliente::class, 'cliente_id');
    // }

    // public function equipe()
    // {
    //     return $this->hasMany(Equipe::class, 'projeto_id');
    // }

    // public function freelancers()
    // {
    //     return $this->belongsToMany(Freelancer::class, 'equipes', 'projeto_id', 'membro_id')
    //         ->withPivot('cargo_equipe');
    // }
    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }
}
